import React from 'react';

const MessageAlert = (props) => {
    return (
        <div className={"mt-3 col-md-6 alert alert-" + props.type + " message-alert " + props.display} role="alert">
            <div className="close-alert " onClick={props.close}>
                <i className="mdi mdi-close-box-outline "></i>
            </div>
            <h4 className="alert-heading">{props.title}</h4>
            <p>{props.text}</p>
            <div className={props.type != 'success' ? 'd-none' : ''}>
                <hr/>
                <a href={props.link} className="mb-0">lallalala</a>
            </div>
        </div>
    );
}
export default MessageAlert;