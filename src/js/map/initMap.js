async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const popupSection = document.querySelector('#pop-up');
    const popupTitle = document.querySelector('#title-pop-up');
    const popupDate = document.querySelector('#date-pop-up');
    const popupDescription = document.querySelector('#description-para-pop-up');
    const popupPrice = document.querySelector('#price-value-pop-up');
    const popupImg = document.querySelector('#pop-up-image');

    const map = new Map(document.querySelector('#map'), {
        mapId: MapConfig.mapId,
        center: MapConfig.pos,
        zoom: MapConfig.zoom,
        maxZoom: MapConfig.maxZoom,
        streetViewControl: MapConfig.streetViewControl,
        fullscreenControl: MapConfig.fullscreenControl
    });

    const response = await fetch('../../../php/markers.php');
    const markersData = await response.json();

    let markers = [];
    for (let i = 0; i < markersData.length; i++) {
        const dateToCheck = new Date(markersData[i].StartDate);
        const dateToday = new Date();
        if (dateToday < dateToCheck) {
            const marker = document.createElement('div');
            marker.className = 'marker';
            marker.innerHTML = `${markersData[i].Title} <span class="price">${markersData[i].Price} PLN</span><br>
                            ${markersData[i].StartDate} → ${markersData[i].EndDate}`;
            markers[i] = new AdvancedMarkerElement({
                position: { lat: parseFloat(markersData[i].Latitude), lng: parseFloat(markersData[i].Longitude) },
                map: map,
                content: marker,
                title: `${i+1}`
            });


        markers[i].addListener('click', async evt => {
            fetch('../../../php/popUp.php', {
                method: 'POST',
                body: JSON.stringify({id: `${i+1}`}),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(responseJson => {
                    sessionStorage.setItem('id', `${i+1}`)
                    sessionStorage.setItem('title', `${responseJson[0]['Title']}`)
                    sessionStorage.setItem('date', responseJson[0]['StartDate'] + ' → ' + responseJson[0]['EndDate'])
                    sessionStorage.setItem('description', `${responseJson[0]['Description']}`)
                    sessionStorage.setItem('price', responseJson[0]['Price'] + " PLN")

                    popupTitle.textContent = responseJson[0]['Title'];
                    popupDate.textContent = responseJson[0]['StartDate'] + ' → ' + responseJson[0]['EndDate'];
                    popupDescription.textContent = responseJson[0]['Description'];
                    popupPrice.textContent = responseJson[0]['Price'] + " PLN";


            fetch('../../../php/popUpImage.php', {
                method: 'POST',
                body:JSON.stringify({id: `${i+1}`}),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(response => response.json())
                .then(responseJson => {
                    sessionStorage.setItem('imageSrc', `${responseJson[0]['Image']}`);
                    popupImg.setAttribute('src', `${responseJson[0]['Image']}`);
                })


                popupSection.classList.remove('hide');
                markers.forEach((el) => el.zIndex = 0);
                map.setZoom(11);
                map.setCenter(markers[i].position)
                markers[i].zIndex = 1;



            })
        }
    }
 }