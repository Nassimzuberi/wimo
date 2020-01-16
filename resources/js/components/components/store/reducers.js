import * as actions from'./actions';

export const cart = (state = [],action) => {
    switch(action.type){
        case actions.ADD_PRODUCT : {
            let product = action.product;
            product['quantityCart'] = parseInt(action.quantityCart);
            return [...state, product];
        }
        case actions.DELETE_PRODUCT: {
            return state.filter((t,i) => i !== action.index)
        }
        case actions.ADD_QUANTITY: {
                return state.map( (t,i) => {
                    if (i === action.index) {
                        t.quantityCart += parseInt(action.quantity)
                    }
                    return t;
                })
        }
        case actions.REMOVE_QUANTITY: {
            return state.map( (t,i) => {
                if (i === action.index) {
                    t.quantityCart -= parseInt(action.quantity)
                }
                return t;
            })
    }
        default : {
            return state
        }
    }
}

