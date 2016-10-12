var CvBox = React.createClass({
    loadCvFromServer: function() {
        $.ajax({
            url: this.props.url,
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({data: data});
            }.bind(this),
            error: function (xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });
    },
    getInitialState: function() {
        return {data: []};
    },
    cvDidMount: function() {
        this.loadCvFromServer();
        setInterval(this.loadCvFromServer, this.props.pollInterval);
    },
    render: function() {
        return (
            <div className="cvBox">
                <h1>Resume</h1>
                <InfosList data={this.state.data} />
            </div>
        );
    }
})

var InfosList = React.createClass({
    render: function() {
        var cvNodes = this.props.data.map(function(cv) {
            return (
                <Line firstname={cv.firstname} key={cv.id}>
                    {cv.lastname}
                </Line>
            );
        });

        return (
            <div className="commentList">
                {cvNodes}
            </div>
        );
    }
});

var Line = React.createClass({
    render: function() {
        return (
            <div className="line">
                <h2 className="cvLine">
                    {this.props.firstname}
                </h2>
                {this.props.children}
            </div>
        );
    }
});

ReactDOM.render(
    <CvBox url="/api/resume" pollInterval={2000}/>,
    document.getElementById('content')
);