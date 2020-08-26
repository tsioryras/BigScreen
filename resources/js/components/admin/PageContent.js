import React, {useState} from 'react';
import axios from "axios";

const PageContent = (props) => {
    const [content, setContent] = useState('');
    const [url, setUrl] = useState('');
    switch (props.page) {
        case 'Questions':
            setUrl('http://localhost:3000/administration/users');
            break;
        case 'Réponses':
            setUrl('shttp://localhost:3000/administration/users');
            break;
        default:
            setUrl('http://localhost:3000/administration/users');
            break;

    }

    const dataGet = axios.get(url).then(function (response) {
        setContent(response.data[0].name);
    }).catch(function (error) {
        console.log(error);
    });

    return (
        <div>{content}</div>
    );
};
export default PageContent;