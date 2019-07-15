import {takeLatest, delay, put, all} from 'redux-saga/effects';
import {putNotificationAction, removeNotificationAction} from "../actions/notification-actions";


function* addNotificationEffectSaga(action) {
    try {
        yield put(putNotificationAction(action.payload));
        yield delay(3500);
        let notification = document.getElementById('notification')
        notification.className = 'notification'
        yield delay(500);
        yield put(removeNotificationAction());
    } catch (e) {
        console.log(e)
    }
}

export function* notificationWatcherSaga() {
    yield all([
        yield takeLatest('ADD_NOTIFICATION', addNotificationEffectSaga),
    ]);

}
