import React from 'react';
import {default as Aside} from './Aside/Aside';
import {default as Map} from './Map/Map';
import {connect} from 'react-redux';


const Product = (props) => {
  return (

    props.loaded ? (
      <div className="d-flex flex-column flex-sm-row">
            <div className="col col-sm-4">
              <Aside sells={ props.sells} selectedSell={props.selectedSell} selectSell={props.selectSell} />
            </div>
            <div className="col col-sm-8">
              <Map  position={props.position} sells={props.sells} zoom={props.zoom} selectSell={props.selectSell}/>
            </div>

          </div>

  ) : (
      <div>Loading...</div>
  )
  )
    
    
}

export default connect(state => {
  let cart = state.cart
  return {cart}
})(Product);