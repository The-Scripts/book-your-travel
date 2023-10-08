async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    let markers = [];

    const map = new Map(document.querySelector('#map'), {
        mapId: MapConfig.mapId,
        center: MapConfig.pos,
        zoom: MapConfig.zoom,
        maxZoom: MapConfig.maxZoom,
        streetViewControl: MapConfig.streetViewControl,
        fullscreenControl: MapConfig.fullscreenControl
    });

    // Fetch the markers data from the PHP script
    const response = await fetch('../../../php/Markers.php');
    const data = await response.json();
    for (let i = 0; i < data.length; i++) {
        const marker = document.createElement('div');
        marker.className = 'marker';
        marker.textContent = data[i].label;
        markers[i] = new AdvancedMarkerElement({
            position: { lat: parseFloat(data[i].lat), lng: parseFloat(data[i].lng) },
            map: map,
            content: marker
        })
    }}