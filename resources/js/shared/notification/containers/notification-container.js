import {connect} from 'react-redux';
import Notification from '../components/notification'

export default connect(
    state => ({
        messages: state.notifications.get('messages'),
    }),
    null
)(Notification);
