async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    const popupSection = document.querySelector('#pop-up');
    const popupTitle = document.querySelector('#title-pop-up');
    const popupDate = document.querySelector('#date-pop-up');
    const popupCity = document.querySelector('#city-pop-up');

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
                    console.log(responseJson);
                    popupTitle.textContent = responseJson[0]['Title'];
                    popupDate.textContent = responseJson[0]['StartDate'] + ' → ' + responseJson[0]['EndDate'];
                })
            console.log(markers[i].title);
            popupSection.classList.remove('hide');
            markers.forEach((el) => el.zIndex = 0);
            map.setZoom(11);
            map.setCenter(markers[i].position)
            markers[i].zIndex = 1;



        })
    }
 }