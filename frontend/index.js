var TopBar = React.createClass({
    render: function(){
        return (
            <nav className="navbar navbar-inverse">
                <div className="container-fluid">
                    <div className="navbar-header">
                        <Logo />
                    </div>
                    <ul className="nav navbar-nav navbar-right">
                        <li><SignInButton/></li>
                    </ul>
                </div>
            </nav>
        );
    }
});

var SignInButton = React.createClass({
    render: function(){
        return(
            <input type="button" className="btn btn-default navbar-btn" value="Sign In"/>
        );
    }
});

var Logo = React.createClass({
    render: function(){
        return(
          <a className="navbar-brand" href="#">
              CvEngine
          </a>
        );
    }
})

ReactDOM.render(
    <TopBar/>,
    document.getElementById('example')
);