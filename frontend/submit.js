var SubmitBox = React.createClass({
    handleCvSubmit: function(comment) {
        // TODO: submit to the server and refresh the list
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            type: 'POST',
            data: comment,
            success: function(data) {
                this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    render: function() {
        return (
            <div className="submitBox">
                <h1>Submit a new CV</h1>
                <SubmitForm onCvSubmit={this.handleCvSubmit} />
            </div>
        );
    }
});

var SubmitForm = React.createClass({
    getInitialState: function() {
        return {firstname: '', lastname: ''};
    },
    handleFirstnameChange: function(e) {
        this.setState({firstname: e.target.value});
    },
    handleLastnameChange: function(e) {
        this.setState({lastname: e.target.value});
    },
    handleSubmit: function(e) {
        e.preventDefault();
        var firstname = this.state.firstname.trim();
        var lastname = this.state.lastname.trim();
        if (!lastname || !firstname) {
            return;
        }
        // TODO: send request to the server
        this.props.onCvSubmit({firstname: firstname, lastname: lastname});
        this.setState({firstname: '', lastname: ''});
    },
    render: function() {
        return (
            <form className="submitForm" onSubmit={this.handleSubmit}>
                <input
                    type="text"
                    placeholder="Firstname"
                    value={this.state.firstname}
                    onChange={this.handleFirstnameChange}
                />
                <input
                    type="text"
                    placeholder="Lastname"
                    value={this.state.lastname}
                    onChange={this.handleLastnameChange}
                />
                <input type="submit" value="Submit" />
            </form>
        );
    }
});

ReactDOM.render(
    <SubmitBox/>,
    document.getElementById('content')
);