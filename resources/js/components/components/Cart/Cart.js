import React from 'react';
import {connect} from 'react-redux';
import {DeleteProduct,AddQuantity,RemoveQuantity} from '../store/actions';

const Cart = ({cart,total,AddQuantity,RemoveQuantity,DeleteProduct}) => {
    return (
      <div className="card m-5">
        
        <div className="card-body">
        <div className="card-title"><h3>Bio cart </h3></div>
          {cart[0] ? cart.map((t,i) => (
            <>
            <div key={i} className="d-flex flex-column flex-sm-row align-items-center">
                <div ><img src={t.img} width="100" /> </div>
                <div className="d-flex flex-column flex-sm-row flex-fill  align-items-center border mt-3 mt-sm-0 ml-sm-3 p-3 text-center text-sm-left">
                    <div className="d-flex flex-column ">
                        <h6  >{t.name} </h6>
                        <div className="d-flex flex-column flex-sm-row"><div className="mr-sm-1">quantity:  {t.quantityCart} </div> 
                          <div className="d-flex flex-row justify-content-center justify-content-sm-start">
                          <button onClick={() => t.quantityCart > 0 ? RemoveQuantity(i) : ''} type="button" className="btn btn-sm btn-outline-dark mx-1" disabled={ t.quantityCart <= 0 ? true : false}>
                            <i  className="fas fa-minus "></i>
                          </button> 
                          <button onClick={() => t.quantity > t.quantityCart ? AddQuantity(i) : ''} type="button" className="btn btn-sm btn-outline-dark" disabled={ t.quantity <= t.quantityCart ? true : false}>
                              <i  className="fas fa-plus"></i>     
                          </button>
                          </div>
                        </div>
                        <div  >
                            Prix : { (t.prix_unit * t.quantityCart).toFixed(2)} € 
                        </div>
                    </div>
                    <div className="ml-sm-auto">
                    <button type="button" onClick={() => DeleteProduct(i)} className="btn btn-sm btn-outline-danger">
                    <i className="fas fa-trash-alt"></i>
                    </button>
                    </div>
                </div>
            </div>

            <hr className="w-100"/>
            </>
          )) : ( <small>Aucun article</small> )}

        </div>
        <div className="card-footer">
              <div className="d-flex flex-row align-items-baseline w-100">
                <div className="t"> TOTAL : {total} € </div>
                <div className="ml-auto"> <button type="button" className="btn btn-warning">Commander</button></div>    
                </div> 
          </div>
      </div>
    )
    
  }

export default connect(state => {
  let cart = state.cart;
  let total = 0;
  state.cart.map((t,i) => {
    return total += t.prix_unit * t.quantityCart;
  })
  return {cart,total : total.toFixed(2)}
},{DeleteProduct,AddQuantity, RemoveQuantity})(Cart);