import React from 'react';
import 'leaflet/dist/leaflet.css';
import { Map as LeafletMap, TileLayer, Marker, Popup } from 'react-leaflet';



const MapLeaf = (props) => {

        return (
<LeafletMap center={props.position} zoom={props.zoom}>
            <TileLayer
                attribution='&amp;copy <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
            />
            {props.sells.map((s,i) => (
                <Marker key={i} position={[s.lat,s.long]} OnClick={() => {props.selectSell(s.id)}} >
                    <Popup>
                        {s.name}
                    </Popup>
                </Marker>
            ))}
            
            </LeafletMap>


        )
}

export default MapLeaf;
