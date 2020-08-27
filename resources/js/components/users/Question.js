import React from 'react';
import QuestionTypeB from "./QuestionTypeB";
import QuestionTypeAC from "./QuestionTypeAC";

const Question = (props) => {
    if (props.type === 'B') {
        return <QuestionTypeB number={props.number} title={props.title}
                              label={props.content.label} type={props.content.choice}/>;
    } else {
        return <QuestionTypeAC number={props.number} options={props.content.choice}
                               title={props.title} label={props.content.label}/>;
    }
};

export default Question;