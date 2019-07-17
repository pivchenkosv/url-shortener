import {takeEvery, delay, put, all} from 'redux-saga/effects';
import {putNotificationAction, removeNotificationAction} from "../actions/notification-actions";


function* addNotificationEffectSaga(action) {
    try {
        yield put(putNotificationAction(action.payload));

        yield delay(10);
        let notifications = document.getElementsByClassName('notification__hide');
        notifications[notifications.length - 1].className = 'notification notification__show';

        yield delay(3500);
        notifications = document.getElementsByClassName('notification__show');
        notifications[0].className = 'notification notification__hide';

        yield delay(600);
        yield put(removeNotificationAction());

        yield delay(10);
        notifications = document.getElementsByClassName('notification__hide');
        notifications[notifications.length - 1].className = 'notification notification__show no-transition';
    } catch (e) {
        console.log(e)
    }
}

export function* notificationWatcherSaga() {
    yield all([
        yield takeEvery('ADD_NOTIFICATION', addNotificationEffectSaga),
    ]);

}
