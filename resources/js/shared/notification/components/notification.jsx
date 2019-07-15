import React, {Component} from "react";

import "./notification.scss"

class Notification extends Component {

    componentDidUpdate(prevProps, prevState, snapshot) {
        const { message } = this.props
        if (message) {
            let notification = document.getElementById('notification')
            notification.className = 'notification notification__show'
        }
    }

    render() {
        const { message } = this.props
        return (
            <div className='notification-container'>
                <div id='notification' className="notification">
                    {message}
                </div>
            </div>
        );
    }
}

export default Notification
