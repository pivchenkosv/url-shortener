import { createAction } from 'redux-actions';

export const addNotification = createAction(
    'ADD_NOTIFICATION',
    message => ({message})
)

export const removeNotificationAction = createAction(
    'REMOVE_NOTIFICATION',
)

export const putNotificationAction = createAction(
    'PUT_NOTIFICATION',
    message => (message)
)
