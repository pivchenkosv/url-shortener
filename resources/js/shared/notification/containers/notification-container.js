import {connect} from 'react-redux';
import Notification from '../components/notification'

export default connect(
    state => ({
        message: state.notifications.get('message')
    }),
    null
)(Notification);
