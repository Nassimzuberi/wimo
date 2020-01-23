import React from 'react';
import SellElement from './SellElement/SellElement';
import {connect} from 'react-redux';
import {addProduct} from '../../../../cart/store/actions';

const SellList = (props) => {
    return (
<ul className="list-group p-3 mr-n4 scroll">
            {props.sells.map( (s,i) => (
                <SellElement key={i} sell={s} selectedSell={props.selectedSell} selectSell={props.selectSell} addProduct={props.addProduct} />
            ))}
        </ul>


    )
}

export default connect(null,{
    addProduct
})(SellList)