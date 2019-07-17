import {handleActions} from "redux-actions";
import {putNotificationAction, removeNotificationAction} from "../actions/notification-actions";
import NotificationRecord from "../records/notification-record";

const NotificationReducer = handleActions({

    [putNotificationAction]: (state, action) =>  state.update('messages', messages => messages.push(action.payload.message)),
    [removeNotificationAction]: (state) => state.update('messages', messages => messages.shift()),

}, new NotificationRecord())

export default NotificationReducer
