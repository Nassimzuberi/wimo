import React from 'react';
import { useParams } from 'react-router-dom';
import {connect} from 'react-redux';
import {addProduct,AddQuantity} from '../../../store/actions';


const SelectQuantity = ({quantity,cart,id}) => {
    let inCart = (element) => element.id === id;

    let tempo = cart.some(inCart) ? 
            (quantity - cart[id-1].quantityCart) 
            : quantity;
    const select = [];
    tempo == 0 ? select.push(<option value="0">Plus de stock</option>): '';
    for (let i=1;i<= tempo;i++){
           select.push(<option value={i}>{i}</option>)
    }
    return select;
    }
class Sell extends React.Component {
    
    constructor(props){
        super(props);
        this.input = React.createRef();
        this.sell = this.props.sell;
        this.add = () => {
            let inCart = (element) => element.id === this.sell.id;
            this.props.cart.some(inCart) ? 
                (this.props.AddQuantity(this.sell.id - 1, this.input.current.value ))
                :  (this.props.addProduct({...this.sell},this.input.current.value));
        }
    }
    
    render (){


        return (
            <div className="text-center border p-2">
                <img alt={this.sell.name} src={this.sell.img} width="200"/>
                <h4>{this.sell.name}</h4>
                <div className="border">
                    <div> {this.sell.description} </div>
                    <div> {this.sell.prix_unit} € l'unité </div>
                    <div className="-d-flex flex-sm-row align-items-baseline m-2">
                        <button type="button" className="btn btn-sm btn-info mx-1 " onClick={this.add}>
                            Ajouter au panier
                        </button>
                        <select ref={this.input}>
                            <SelectQuantity quantity={this.sell.quantity} cart={this.props.cart} id={this.sell.id} />
                        </select>
                    </div>
                    

                </div>
            </div>
        )
    }
}

const SellDetails = ({sells,addProduct,cart,AddQuantity}) => {
    let {id} = useParams();
    const sell = sells[id - 1];
    return <Sell sell={sell} addProduct={addProduct} cart={cart} AddQuantity={AddQuantity} />
}

export default connect(state => {
    let cart = state.cart;
    return {cart}
},{
    addProduct,
    AddQuantity
})(SellDetails);