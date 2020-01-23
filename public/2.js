(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[2],{

/***/ "./resources/js/features/user/components/Commandes.js":
/*!************************************************************!*\
  !*** ./resources/js/features/user/components/Commandes.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../store */ "./resources/js/features/user/store/index.js");
/* harmony import */ var _store_actions__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../store/actions */ "./resources/js/features/user/store/actions.js");
function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }






var Commandes =
/*#__PURE__*/
function (_React$Component) {
  _inherits(Commandes, _React$Component);

  function Commandes(props) {
    var _this;

    _classCallCheck(this, Commandes);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(Commandes).call(this, props));

    _this.props.fetchUserCommandes();

    return _this;
  }

  _createClass(Commandes, [{
    key: "render",
    value: function render() {
      var commandes = this.props.commandes;
      return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "container"
      }, commandes.data.map(function (t) {
        return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
          className: "d-flex flex-row my-3 border p-3 align-items-center"
        }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
          className: ""
        }, " Commande n\xB0", t.id, " "), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
          className: "d-flex flex-column m-3"
        }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, "Vous avez command\xE9 ", t.quantity, " ", t.produit.name)), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
          className: "ml-auto"
        }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, "Total commande : ", t.total, " \u20AC"), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, " Statut : Non r\xE9cup\xE9rer")));
      }));
    }
  }]);

  return Commandes;
}(react__WEBPACK_IMPORTED_MODULE_0___default.a.Component);

/* harmony default export */ __webpack_exports__["default"] = (Object(react_redux__WEBPACK_IMPORTED_MODULE_1__["connect"])(function (state) {
  var commandes = state.commandes;
  return {
    commandes: commandes
  };
}, {
  fetchUserCommandes: _store_actions__WEBPACK_IMPORTED_MODULE_3__["fetchUserCommandes"]
})(Commandes));

/***/ }),

/***/ "./resources/js/features/user/index.js":
/*!*********************************************!*\
  !*** ./resources/js/features/user/index.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_Commandes__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/Commandes */ "./resources/js/features/user/components/Commandes.js");

/* harmony default export */ __webpack_exports__["default"] = (_components_Commandes__WEBPACK_IMPORTED_MODULE_0__["default"]);

/***/ }),

/***/ "./resources/js/features/user/store/actions.js":
/*!*****************************************************!*\
  !*** ./resources/js/features/user/store/actions.js ***!
  \*****************************************************/
/*! exports provided: REQUEST_USER_COMMANDES, FETCH_USER_COMMANDES, FETCH_USER_COMMANDES_SUCCESS, FETCH_USER_COMMANDES_ERROR, requestUserCommandes, fetchUserCommandesSuccess, fetchUserCommandesError, fetchUserCommandes */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "REQUEST_USER_COMMANDES", function() { return REQUEST_USER_COMMANDES; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FETCH_USER_COMMANDES", function() { return FETCH_USER_COMMANDES; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FETCH_USER_COMMANDES_SUCCESS", function() { return FETCH_USER_COMMANDES_SUCCESS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FETCH_USER_COMMANDES_ERROR", function() { return FETCH_USER_COMMANDES_ERROR; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "requestUserCommandes", function() { return requestUserCommandes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "fetchUserCommandesSuccess", function() { return fetchUserCommandesSuccess; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "fetchUserCommandesError", function() { return fetchUserCommandesError; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "fetchUserCommandes", function() { return fetchUserCommandes; });
/* harmony import */ var _api_apiLaravel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../api/apiLaravel */ "./resources/js/api/apiLaravel.js");

var REQUEST_USER_COMMANDES = 'request user commandes';
var FETCH_USER_COMMANDES = 'fetch user commandes';
var FETCH_USER_COMMANDES_SUCCESS = 'fetch user commandes success';
var FETCH_USER_COMMANDES_ERROR = 'fetch user commandes ERROR';
var requestUserCommandes = function requestUserCommandes() {
  return {
    type: REQUEST_USER_COMMANDES
  };
};
var fetchUserCommandesSuccess = function fetchUserCommandesSuccess(commandes) {
  return {
    type: FETCH_USER_COMMANDES_SUCCESS,
    commandes: commandes
  };
};
var fetchUserCommandesError = function fetchUserCommandesError(error) {
  return {
    type: FETCH_USER_COMMANDES_ERROR,
    error: error
  };
};
var fetchUserCommandes = function fetchUserCommandes() {
  return function (dispatch, getState) {
    dispatch(requestUserCommandes);
    return _api_apiLaravel__WEBPACK_IMPORTED_MODULE_0__["default"].get('users/1/commandes').then(function (response) {
      return dispatch(fetchUserCommandesSuccess(response.data), function (error) {
        return dispatch(fetchUserCommandesError(error));
      });
    });
  };
};

/***/ }),

/***/ "./resources/js/features/user/store/index.js":
/*!***************************************************!*\
  !*** ./resources/js/features/user/store/index.js ***!
  \***************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../store */ "./resources/js/store/index.js");
/* harmony import */ var _reducers__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./reducers */ "./resources/js/features/user/store/reducers.js");


Object(_store__WEBPACK_IMPORTED_MODULE_0__["injectReducer"])('commandes', _reducers__WEBPACK_IMPORTED_MODULE_1__["commandesReducers"]);

/***/ }),

/***/ "./resources/js/features/user/store/reducers.js":
/*!******************************************************!*\
  !*** ./resources/js/features/user/store/reducers.js ***!
  \******************************************************/
/*! exports provided: commandesReducers */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "commandesReducers", function() { return commandesReducers; });
/* harmony import */ var _actions__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./actions */ "./resources/js/features/user/store/actions.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }


var commandesReducers = function commandesReducers() {
  var state = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {
    data: [],
    loading: false,
    error: null
  };
  var action = arguments.length > 1 ? arguments[1] : undefined;

  switch (action.type) {
    case _actions__WEBPACK_IMPORTED_MODULE_0__["REQUEST_USER_COMMANDES"]:
      {
        return _objectSpread({}, state, {
          loading: true
        });
      }

    case _actions__WEBPACK_IMPORTED_MODULE_0__["FETCH_USER_COMMANDES_SUCCESS"]:
      {
        return _objectSpread({}, state, {
          loading: false,
          data: action.commandes
        });
      }

    case _actions__WEBPACK_IMPORTED_MODULE_0__["FETCH_USER_COMMANDES_ERROR"]:
      {
        return _objectSpread({}, state, {
          error: error
        });
      }

    default:
      {
        return state;
      }
  }
};

/***/ })

}]);