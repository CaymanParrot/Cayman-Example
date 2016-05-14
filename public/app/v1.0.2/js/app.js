'use strict';

var LikeButton = React.createClass({
  getInitialState: function() {
    return {liked: false};
  },
  handleClick: function(event) {
    this.setState({liked: !this.state.liked});
  },
  render: function() {
    var text = this.state.liked ? 'like' : 'haven\'t liked';
    return (
      <p onClick={this.handleClick}>
        You {text} this. Click to toggle.
      </p>
    );
  }
});

var MyIdentity = React.createClass({
  getInitialState: function() {
    return {
      token: null,
      user: null,
      email: null,
      firstName: null
    };
  },

  componentDidMount: function() {
    /*$.get(this.props.source, function(result) {
      var lastGist = result[0];
      if (this.isMounted()) {
        this.setState({
          username: lastGist.owner.login,
          lastGistUrl: lastGist.html_url
        });
      }
    }.bind(this));*/
  },

  render: function() {
    return (
      <div>
        {this.state.email}
      </div>
    );
  }
});


var MyAlertsMenu = React.createClass({
  render: function() {
    return (
      <ul className="dropdown-menu dropdown-alerts">
        <li>
            <a href="#">
                <div>
                    <i className="fa fa-comment fa-fw"></i> New Comment
                    <span className="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a href="#">
                <div>
                    <i className="fa fa-twitter fa-fw"></i> 3 New Followers
                    <span className="pull-right text-muted small">12 minutes ago</span>
                </div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a href="#">
                <div>
                    <i className="fa fa-envelope fa-fw"></i> Message Sent
                    <span className="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a href="#">
                <div>
                    <i className="fa fa-tasks fa-fw"></i> New Task
                    <span className="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a href="#">
                <div>
                    <i className="fa fa-upload fa-fw"></i> Server Rebooted
                    <span className="pull-right text-muted small">4 minutes ago</span>
                </div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a className="text-center" href="#">
                <strong>See All Alerts</strong>
                <i className="fa fa-angle-right"></i>
            </a>
        </li>
    </ul>
    );
  }
});

var MyTasksMenu = React.createClass({
  render: function() {
    return (
      <ul className="dropdown-menu dropdown-tasks">
        <li>
            <a href="#">
                <div>
                    <p>
                        <strong>Task 1</strong>
                        <span className="pull-right text-muted">40% Complete</span>
                    </p>
                    <div className="progress progress-striped active">
                        <div className="progress-bar progress-bar-success" 
                            role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                            <span className="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                </div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a className="text-center" href="#">
                <strong>See All Tasks</strong>
                <i className="fa fa-angle-right"></i>
            </a>
        </li>
      </ul>
    );
  }
});

var MyMessagesMenu = React.createClass({
  render: function() {
    return (
      <ul className="dropdown-menu dropdown-messages">
        <li>
            <a href="#">
                <div>
                    <strong>John Smith</strong>
                    <span className="pull-right text-muted">
                        <em>Yesterday</em>
                    </span>
                </div>
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a href="#">
                <div>
                    <strong>John Smith</strong>
                    <span className="pull-right text-muted">
                        <em>Yesterday</em>
                    </span>
                </div>
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a href="#">
                <div>
                    <strong>John Smith</strong>
                    <span className="pull-right text-muted">
                        <em>Yesterday</em>
                    </span>
                </div>
                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
            </a>
        </li>
        <li className="divider"></li>
        <li>
            <a className="text-center" href="#">
                <strong>Read All Messages</strong>
                <i className="fa fa-angle-right"></i>
            </a>
        </li>
      </ul>
    );
  }
});

var MyUserMenu = React.createClass({
  render: function() {
    return (
      <ul className="dropdown-menu dropdown-user">
        <li>
            <a href="#"><i className="fa fa-user fa-fw"></i> User Profile</a>
        </li>
        <li>
            <a href="#"><i className="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li className="divider"></li>
        <li>
            <a href="login.html"><i className="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
      </ul>
    );
  }
});


var MyNavBar = React.createClass({
  render: function() {
    return (
      <nav className="navbar navbar-default navbar-static-top" role="navigation">
            <div className="navbar-header">
                <button type="button" className="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span className="sr-only">Toggle navigation</span>
                    <span className="icon-bar"></span>
                    <span className="icon-bar"></span>
                    <span className="icon-bar"></span>
                </button>
                <a className="navbar-brand" href="index.html">My Bazaar</a>
            </div>

            <ul className="nav navbar-top-links navbar-right">
                <li className="dropdown">
                    <a className="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i className="fa fa-envelope fa-fw"></i>  <i className="fa fa-caret-down"></i>
                    </a>
                    <MyMessagesMenu />
                </li>
                
                <li className="dropdown">
                    <a className="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i className="fa fa-tasks fa-fw"></i>  <i className="fa fa-caret-down"></i>
                    </a>
                    <MyTasksMenu />
                </li>
                
                <li className="dropdown">
                    <a className="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i className="fa fa-bell fa-fw"></i>  <i className="fa fa-caret-down"></i>
                    </a>
                    <MyAlertsMenu />
                </li>
                
                <li className="dropdown">
                    <a className="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i className="fa fa-user fa-fw"></i>  <i className="fa fa-caret-down"></i>
                    </a>
                    <MyUserMenu />
                </li>
            </ul>
      </nav>
    );
  }
});

var MyLoginForm = React.createClass({
  render: function() {
    return (
        <form role="form">
            <fieldset>
                <div className="form-group">
                    <input type="email" placeholder="E-mail" name="email" className="form-control" autofocus />
                </div>
                <div className="form-group">
                    <input type="password" placeholder="Password" name="password" className="form-control" value="" />
                </div>
                <div className="form-group">
                    <a href="index.html" className="btn btn-success">Login</a>
                </div>
            </fieldset>
        </form>
    );
  }
});

var MyLoginPanel = React.createClass({
  render: function() {
    return (
        <div className="login-panel panel panel-default">
            <div className="panel-heading">
                <h3 className="panel-title">{this.props.title}</h3>
            </div>
            <div className="panel-body">
                <MyLoginForm />
            </div>
        </div>
    );
  }
});


// Simple pure-React component so we don't have to remember
// Bootstrap's classes
var BootstrapButton = React.createClass({
  render: function() {
    return (
      <a {...this.props}
        href="javascript:;"
        role="button"
        className={(this.props.className || '') + ' btn'} />
    );
  }
});

var BootstrapModal = React.createClass({
  // The following two methods are the only places we need to
  // integrate Bootstrap or jQuery with the components lifecycle methods.
  componentDidMount: function() {
    // When the component is added, turn it into a modal
    $(this.refs.root).modal({backdrop: 'static', keyboard: false, show: false});

    // Bootstrap's modal class exposes a few events for hooking into modal
    // functionality. Lets hook into one of them:
    $(this.refs.root).on('hidden.bs.modal', this.handleHidden);
  },
  componentWillUnmount: function() {
    $(this.refs.root).off('hidden.bs.modal', this.handleHidden);
  },
  close: function() {
    $(this.refs.root).modal('hide');
  },
  open: function() {
    $(this.refs.root).modal('show');
  },
  render: function() {
    var confirmButton = null;
    var cancelButton = null;

    if (this.props.confirm) {
      confirmButton = (
        <BootstrapButton
          onClick={this.handleConfirm}
          className="btn-primary">
          {this.props.confirm}
        </BootstrapButton>
      );
    }
    if (this.props.cancel) {
      cancelButton = (
        <BootstrapButton onClick={this.handleCancel} className="btn-default">
          {this.props.cancel}
        </BootstrapButton>
      );
    }

    return (
      <div className="modal fade" ref="root">
        <div className="modal-dialog">
          <div className="modal-content">
            <div className="modal-header">
              <button
                type="button"
                className="close"
                onClick={this.handleCancel}>
                &times;
              </button>
              <h3>{this.props.title}</h3>
            </div>
            <div className="modal-body">
              {this.props.children}
            </div>
            <div className="modal-footer">
              {cancelButton}
              {confirmButton}
            </div>
          </div>
        </div>
      </div>
    );
  },
  handleCancel: function() {
    if (this.props.onCancel) {
      this.props.onCancel();
    }
  },
  handleConfirm: function() {
    if (this.props.onConfirm) {
      this.props.onConfirm();
    }
  },
  handleHidden: function() {
    if (this.props.onHidden) {
      this.props.onHidden();
    }
  }
});

var MyHeader = React.createClass({
  propTypes: {
    title: React.PropTypes.string.isRequired,
  },
  render: function() {
      return (
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{this.props.title}</h1>
            </div>
        </div>
      );
  }
});

var MyPageLogin = React.createClass({
  render: function() {
      return (
        <div className="row">
          <div className="col-md-4 col-md-offset-4">
            <MyLoginPanel
              ref="login"
              title="Please Login">
            </MyLoginPanel>
          </div>
        </div>
      );
  }
});

var MyApp = React.createClass({
  getInitialState: function() {
    return {current: 0};
  },

  componentDidMount: function() {
    this.interval = setInterval(this.tick, INTERVAL);
  },

  componentWillUnmount: function() {
    clearInterval(this.interval);
  },

  tick: function() {
    this.setState({current: this.state.current + 1});
  },
  render: function() {
    var modal = null;
    modal = (
      <BootstrapModal
        ref="modal"
        confirm="OK"
        cancel="Cancel"
        onCancel={this.handleCancel}
        onConfirm={this.closeModal}
        onHidden={this.handleModalDidClose}
        title="Hello, Bootstrap!">
          This is a React component powered by jQuery and Bootstrap!
      </BootstrapModal>
    );
    /*
<div className="row">
          <div className="col-md-4 col-md-offset-4">
            <MyLoginPanel
              ref="login"
              title="Please Login">
            </MyLoginPanel>
          </div>
        </div>
        <div className="row">
          <BootstrapButton onClick={this.openModal} className="btn-default">
            Open modal
          </BootstrapButton>
          <BootstrapButton onClick={this.openLogin} className="btn-default">
            Login
          </BootstrapButton>
        </div>
        <div>
          {modal}
        </div>
    */
    return (
      <div className="example">
        <MyNavBar />
        <div id="page-wrapper"></div>
      </div>
    );
  },
  openModal: function() {
    this.refs.modal.open();
  },
  closeModal: function() {
    this.refs.modal.close();
  },
  handleCancel: function() {
    if (confirm('Are you sure you want to cancel?')) {
      this.refs.modal.close();
    }
  },
  openLogin: function() {
    this.refs.login.open();
  },
  closeLogin: function() {
    this.refs.login.close();
  },
  handleModalDidClose: function() {
    alert("The modal has been dismissed!");
  }
});

ReactDOM.render(<MyApp />, document.getElementById('wrapper'));
