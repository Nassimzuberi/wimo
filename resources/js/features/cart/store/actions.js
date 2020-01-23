import apiLaravel from "../../../api/apiLaravel";

export const ADD_PRODUCT = 'add product';
export const DELETE_PRODUCT = 'delete product';
export const ADD_QUANTITY = 'add quantity';
export const REMOVE_QUANTITY = 'remove quantity';
export const ADD_PAYEMENT_OPTION = 'add payement option'

export const TRY_COMMANDE_VALIDER = 'try commande valider';
export const COMMANDE_VALIDER_SUCCESS = 'commande valider success';
export const COMMANDE_VALIDER_ERROR = 'commande valider error';

export const addProduct = (product,quantityCart = 1) => {
    return {
        type: ADD_PRODUCT,
        product,
        quantityCart
    }

}
export const DeleteProduct = (index) => {
    return {
        type: DELETE_PRODUCT,
        index
    }

}

export const AddQuantity = (index,quantity = 1) => {
    return {
        type: ADD_QUANTITY,
        index,
        quantity
    }

}

export const RemoveQuantity = (index,quantity = 1) => {
    return {
        type: REMOVE_QUANTITY,
        index,
        quantity
    }
}

export const addPayementOption = (option) => {
    return {
        type: ADD_PAYEMENT_OPTION,
        option
    }
}

export const tryCommandeValider = () => {
    return (dispatch,getState) => {
        let user_id = 1 ;
        let validate = getState().cart.data.map(t => ( {
                produit_id : t.id,
                quantity : t.quantityCart,
                total : (t.quantityCart * t.prix_unit),
                user_id,
                payement_option : getState().cart.payementOption,
            }
        ))
        validate.map(t => {
            apiLaravel.post('commandes',t).then(response => dispatch(commandeValiderSuccess(),
                                                    error => dispatch(commandeValiderError(error))));
        })
    }

}

export const commandeValiderSuccess = () => {
    return {
        type: COMMANDE_VALIDER_SUCCESS,
    }
}
export const commandeValiderError = (error) => {
    return {
        type: COMMANDE_VALIDER_ERROR,
        error
    }
}