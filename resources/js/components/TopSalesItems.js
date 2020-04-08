import React from 'react'


const TopSalesItems = ({data}) => {
    return (
        <div className={'mx-2'}>
            <img src={"/images/"+ data.img} width={100}/>
            <div className={"text-center"}><a href={"/annonces/" + data.id} >{data.product.name}</a></div>
        </div>
    )
}
export default TopSalesItems
