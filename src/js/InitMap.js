async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
    let markers = [];

    const map = new Map(document.querySelector('#map'), {
        mapId: MapConfig.mapId,
        center: MapConfig.pos,
        zoom: MapConfig.zoom, // Poziom przybliżenia
        maxZoom: MapConfig.maxZoom,
        streetViewControl: MapConfig.streetViewControl,
        fullscreenControl: MapConfig.fullscreenControl
    });

    for (let i = 0; i < MapConfig.labelMarkers.length; i++) {
        const marker = document.createElement('div');
        marker.className = 'marker';
        marker.textContent = MapConfig.labelMarkers[i];
        markers[i] = new AdvancedMarkerElement({
            position: MapConfig.posMarkers[i],
            map: map,
            content: marker
        })
    }
}
