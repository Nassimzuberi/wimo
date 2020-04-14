import React from 'react';
import ReactDOM from 'react-dom';
import TopSalesItems from "./TopSalesItems";
import {getTopSales} from "./fetchFunction";

class TopSales extends React.Component {
    constructor(props){
        super(props)
        this.state = {
            data : [],
            loading:false,
            current_page: null,
            last_page: null
        }
    }
    componentDidMount() {
        this.updatePage()
    }
    updatePage(page = null){
        this.setState({
            loading:true,
        })
        getTopSales(page).then(data => this.setState({
            data : data.data,
            loading:false,
            current_page : data.meta.current_page,
            last_page : data.meta.last_page,
        }))
    }
    render(){
        return (
            <div className={"recommandation"}>

                <div className={'row align-items-center justify-content-center'}>
                    <i className={"fa fa-arrow-left fa-2x"} onClick={() => this.state.current_page == 1 ? this.updatePage(this.state.last_page) :this.updatePage(this.state.current_page - 1)}></i>
                    {this.state.loading ? (
                        <div className="spinner-border text-dark mx-5" style={{width:'5em',height:'5em'}} role="status">
                            <span className="sr-only">Loading...</span>
                        </div>
                    ): this.state.data.map(t => (
                        <TopSalesItems key={t.id} data={t} />
                    )) }
                    <i className={" fa fa-arrow-right fa-2x"} onClick={() => this.state.last_page == this.state.current_page ? this.updatePage() :this.updatePage(this.state.current_page + 1)}></i>

                </div>


            </div>
        );
    }
}

export default TopSales;
