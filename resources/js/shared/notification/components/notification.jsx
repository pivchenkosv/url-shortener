import React, {Component} from "react";

import "./notification.scss"
import PropTypes from "prop-types";

class Notification extends Component {
    // static propTypes = {
    //     messages: PropTypes.array,
    // };

    render() {
        const { messages } = this.props
        return (
            <div id='notification-container' className='notification-container'>
                {
                    messages.map((message, id) => {
                        return (
                            <div key={id} className="notification notification__hide">
                                {message}
                            </div>
                        )
                    })
                }
            </div>
        );
    }
}

export default Notification
