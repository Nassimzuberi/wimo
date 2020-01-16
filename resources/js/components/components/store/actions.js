export const ADD_PRODUCT = 'add product';
export const DELETE_PRODUCT = 'delete product';
export const ADD_QUANTITY = 'add quantity';
export const REMOVE_QUANTITY = 'remove quantity';


export const addProduct = (product,quantityCart) => {
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