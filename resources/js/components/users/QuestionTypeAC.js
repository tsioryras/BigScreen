import React from 'react';

const QuestionTypeAC = (props) => {

    const listOptions = props.options.map((optionValue, index) => {
        return <div key={index} className="form-group row">
            <div className="col-md-9">
                <div className="custom-control custom-radio">
                    <input type="radio" className="custom-control-input" name={'question' + props.number}
                           id={'question' + props.number + index}
                           value={optionValue}
                           required/>
                    <label className="custom-control-label" htmlFor={'question' + props.number + index}>
                        {optionValue}</label>
                </div>
            </div>
        </div>
    });
    return (
        <div className={'card mb-5 py-2 ' + props.display}>
            <h3>{props.title}</h3>
            <label>{props.label}</label>
            <section>
                {listOptions}
            </section>
        </div>
    );
};
export default QuestionTypeAC;

