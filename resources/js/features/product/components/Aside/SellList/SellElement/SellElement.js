import React from 'react';
import { Link } from 'react-router-dom';
import { connect } from 'react-redux';

const SellElement = ({sell,selectedSell,addProduct,selectSell}) => {
    return(
        <li onClick={() => selectSell(sell.id)} className="list-group-item list-group-item-action">
            <div className="d-flex w-100 justify-content-between align-items-center">
                <h5 className="mb-1">{sell.name}</h5>
                <small className="border p-3">{sell.prix_unit} € / unité</small>
            </div>
        <div>{sell.tags.map( (t,i) => (
    <div key={i} className="badge badge-pill badge-primary">{t.name}</div>
        ))}</div>
            <small>Produit vendu par {sell.user.name}</small>
            {selectedSell === sell.id - 1 ? (
                <>
    <p className="mb-1">{sell.description}</p>



                </>
            ) : ''}
               <div className="d-flex w-100 justify-content-end">
                    <small>Il en reste : {sell.quantity}</small>
                </div>
                {selectedSell === sell.id - 1 ? (
                <>
                <Link to={"/product/" + sell.id} className="d-block">Voir le produit</Link>

                </>
            ) : ''}
        </li>
        )
}

export default connect()(SellElement);