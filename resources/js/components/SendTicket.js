import React from 'react';
import ReactDOM from 'react-dom';
import Fade from 'react-reveal/Fade'


class SendTicket extends React.Component {
    constructor(props) {
        super(props)

        this.state = {
            isShown: false
        }
    }

    render(){
        console.log(this.props)
        const {children} = this.props
        return (
            <div>
                <div>{children}</div>
                <Fade left >
                    <div>
                        <form>
                            <input type={"text"}/>
                        </form>
                    </div>
                </Fade>
            </div>
        )
    }
}

export default SendTicket
