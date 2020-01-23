import L from 'leaflet';

const iconMarker = new L.Icon({
    //iconUrl: require('../../logo192.png'),
    //iconRetinaUrl: require('../../logo192.png'),
    iconSize: new L.Point(40, 50),
    className: 'leaflet-div-icon'
});

export { iconMarker };