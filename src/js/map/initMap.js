async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

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
            content: marker
        });
        markers[i].addListener('click', (evt) => {
            markers.forEach((el) => el.zIndex = 0);
            map.setZoom(11);
            map.setCenter(markers[i].position)
            markers[i].zIndex = 1;
        })
    }
 }