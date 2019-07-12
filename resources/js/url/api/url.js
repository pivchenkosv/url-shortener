import axios from "axios";

export const loadUrlById = ({id}) => {
    return axios.get(`/api/urls/${url}`)
}
