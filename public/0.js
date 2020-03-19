(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/css-loader/index.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./resources/js/components/TopSales.module.scss":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader!./node_modules/postcss-loader/src??ref--7-2!./node_modules/sass-loader/dist/cjs.js??ref--7-3!./resources/js/components/TopSales.module.scss ***!
  \*****************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nError: ENOENT: no such file or directory, open 'D:\\laragon\\www\\wimo\\resources\\js\\components\\TopSales.module.scss'");

/***/ }),

/***/ "./resources/js/components/TopSales.js":
/*!*********************************************!*\
  !*** ./resources/js/components/TopSales.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-dom */ "./node_modules/react-dom/index.js");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _TopSalesItems__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./TopSalesItems */ "./resources/js/components/TopSalesItems.js");
/* harmony import */ var _fetchFunction__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./fetchFunction */ "./resources/js/components/fetchFunction.js");
function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }






var TopSales =
/*#__PURE__*/
function (_React$Component) {
  _inherits(TopSales, _React$Component);

  function TopSales(props) {
    var _this;

    _classCallCheck(this, TopSales);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(TopSales).call(this, props));
    _this.state = {
      data: [],
      loading: false,
      current_page: null,
      last_page: null
    };
    return _this;
  }

  _createClass(TopSales, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      console.log("MOUNT");
      this.updatePage();
    }
  }, {
    key: "updatePage",
    value: function updatePage() {
      var _this2 = this;

      var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
      this.setState({
        loading: true
      });
      Object(_fetchFunction__WEBPACK_IMPORTED_MODULE_3__["getTopSales"])(page).then(function (data) {
        return _this2.setState({
          data: data.data,
          loading: false,
          current_page: data.meta.current_page,
          last_page: data.meta.last_page
        });
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this3 = this;

      return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: 'row align-items-center justify-content-center'
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("i", {
        className: "fa fa-arrow-left fa-2x",
        onClick: function onClick() {
          return _this3.state.current_page == 1 ? _this3.updatePage(_this3.state.last_page) : _this3.updatePage(_this3.state.current_page - 1);
        }
      }), this.state.loading ? react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "spinner-border text-dark mx-5",
        style: {
          width: '5em',
          height: '5em'
        },
        role: "status"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("span", {
        className: "sr-only"
      }, "Loading...")) : this.state.data.map(function (t) {
        return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_TopSalesItems__WEBPACK_IMPORTED_MODULE_2__["default"], {
          key: t.id,
          data: t
        });
      }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("i", {
        className: " fa fa-arrow-right fa-2x fleche",
        onClick: function onClick() {
          return _this3.state.last_page == _this3.state.current_page ? _this3.updatePage() : _this3.updatePage(_this3.state.current_page + 1);
        }
      })));
    }
  }]);

  return TopSales;
}(react__WEBPACK_IMPORTED_MODULE_0___default.a.Component);

/* harmony default export */ __webpack_exports__["default"] = (TopSales);

/***/ }),

/***/ "./resources/js/components/TopSales.module.scss":
/*!******************************************************!*\
  !*** ./resources/js/components/TopSales.module.scss ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader!../../../node_modules/postcss-loader/src??ref--7-2!../../../node_modules/sass-loader/dist/cjs.js??ref--7-3!./TopSales.module.scss */ "./node_modules/css-loader/index.js!./node_modules/postcss-loader/src/index.js?!./node_modules/sass-loader/dist/cjs.js?!./resources/js/components/TopSales.module.scss");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./resources/js/components/TopSalesItems.js":
/*!**************************************************!*\
  !*** ./resources/js/components/TopSalesItems.js ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _TopSales_module_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./TopSales.module.scss */ "./resources/js/components/TopSales.module.scss");
/* harmony import */ var _TopSales_module_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_TopSales_module_scss__WEBPACK_IMPORTED_MODULE_1__);



var TopSalesItems = function TopSalesItems(_ref) {
  var data = _ref.data;
  return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: _TopSales_module_scss__WEBPACK_IMPORTED_MODULE_1___default.a.recommandation
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("img", {
    src: data.img,
    width: 100
  }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "text-center"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("a", {
    href: "/annonces/" + data.id
  }, data.name)));
};

/* harmony default export */ __webpack_exports__["default"] = (TopSalesItems);

/***/ }),

/***/ "./resources/js/components/fetchFunction.js":
/*!**************************************************!*\
  !*** ./resources/js/components/fetchFunction.js ***!
  \**************************************************/
/*! exports provided: getTopSales */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getTopSales", function() { return getTopSales; });
var getTopSales = function getTopSales() {
  var page = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 1;
  var headerGet = {
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json, text-plain, */*"
    },
    method: 'get'
  };
  return fetch('/topsales?page=' + page, headerGet).then(function (data) {
    return data.json();
  })["catch"](function (error) {
    return console.log(error);
  });
};

/***/ })

}]);