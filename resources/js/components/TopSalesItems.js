import React from 'react'


const TopSalesItems = ({data}) => {
    return (
        <div className={'mx-2'}>
            <img src={"/images/"+ data.img} width={100}/>
<<<<<<< HEAD
            <div className={"text-center"}><a href={"/annonces/" + data.id} >{data.name}</a></div>
=======
            <div className={"text-center"}><a href={"/annonces/" + data.id} >{data.product.name}</a></div>
>>>>>>> 17ac960ac82cde53befde953f6f14c097b67d3dc
        </div>
    )
}
export default TopSalesItems
