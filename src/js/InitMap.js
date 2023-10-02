function initMap() {
    // Utwórz instancję MapConfig


    // Utwórz mapę Google
    const map = new google.maps.Map(document.querySelector('#map'), {
        center: MapConfig.pos,
        zoom: MapConfig.zoom, // Poziom przybliżenia
        maxZoom: MapConfig.maxZoom,
        streetViewControl: MapConfig.streetViewControl,
        fullscreenControl: MapConfig.fullscreenControl
    });
}
