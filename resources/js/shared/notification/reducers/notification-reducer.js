import {handleActions} from "redux-actions";
import {putNotificationAction, removeNotificationAction} from "../actions/notification-actions";
import NotificationRecord from "../records/notification-record";

const NotificationReducer = handleActions({

    [putNotificationAction]: (state, action) => state.set('message', action.payload.message),
    [removeNotificationAction]: (state) => state.set('message', ''),

}, new NotificationRecord())

export default NotificationReducer
