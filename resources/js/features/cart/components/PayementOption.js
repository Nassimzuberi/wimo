import React, { createRef } from 'react';
import {connect} from 'react-redux';
import { Link, Redirect } from 'react-router-dom';
import {tryCommandeValider, addPayementOption} from '../store/actions';

const PayementOption = ({cart,total,tryCommandeValider,addPayementOption}) => {
    const option = createRef();
    const validation = () => {
        //addPayementOption(option);
        tryCommandeValider();
    }
    return (
        <div>
            <div className='card m-2 m-sm-5'>
            <div className="card-header"><h1>Finaliser la commande</h1></div>
                <div className="card-body">

                    {/* Liste des datas du state cart */}
                    
                    {cart.data.map((t,i)=> (
                        <>
                        <div key={i} className="d-flex flex-column flex-sm-row align-items-center">
                        <div ><img src={t.img} width="100" /> </div>
                        <div className="d-flex flex-column flex-sm-row flex-fill  align-items-center border mt-3 mt-sm-0 ml-sm-3 p-3 text-center text-sm-left">
                            <div className="d-flex flex-column ">
                                <h6  >{t.name} </h6>
                                <div className="d-flex flex-column flex-sm-row">
                                    <div className="mr-sm-1">quantity:  {t.quantityCart} </div> 
                                </div>
                                <div  >
                                    Prix : { (t.prix_unit * t.quantityCart).toFixed(2)} € 
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr className="w-100"/>
                    </>
                    ))}

                    {/* Zone des moyens de paiement */}

                    <div className="m-sm-3">
                        <h3>Moyen de paiement</h3>
                        <div className="from-check">
                            <input type="radio"  ref={option} className="form-check-input" value="1"/>
                            <label className="form-check-label">Par espèce</label>
                        </div>
                    </div>
                    
                </div>

                {/*Footer de la card */}

                <div className="card-footer">

                        <div className="d-flex flex-sm-row">
                            TOTAL : {total} €
                            <div className="ml-auto">
                                <Link to="/cart" className="btn btn-success mx-2">Modifier le panier</Link>
                                <button type="button" className="btn btn-warning" onClick={validation}>Finaliser la commande</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    )
}

export default connect(state => {
    let cart = state.cart;
    let total = state.cart.total;
    return {cart,total};
}, {tryCommandeValider,addPayementOption})(PayementOption);