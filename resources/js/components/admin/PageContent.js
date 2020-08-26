import React, {useState} from 'react';
import axios from "axios";

let url;
const PageContent = (props) => {
    const [content, setContent] = useState('');
    switch (props.page) {
        case 'question':
            url = 'http://localhost:3000/administration/users';
            break;
        case 'answer':
            url = 'http://localhost:3000/administration/users';
            break;
        default:
            url = 'http://localhost:3000/administration/users';
            break;

    }

    const dataGet = axios.get(url).then(function (response) {
        setContent(response.data[0].name);
    }).catch(function (error) {
        console.log(error);
    });

    return (
        <div className="rigth-side row">
            <div className="container">
                <div>{content}</div>
            </div>
        </div>
    );
};
export default PageContent;