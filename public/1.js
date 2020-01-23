(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./resources/js/features/product/components/Aside/Aside.js":
/*!*****************************************************************!*\
  !*** ./resources/js/features/product/components/Aside/Aside.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Aside; });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SellList_SellList__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SellList/SellList */ "./resources/js/features/product/components/Aside/SellList/SellList.js");
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router-dom/esm/react-router-dom.js");
/* harmony import */ var _SellDetails_SellDetails__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./SellDetails/SellDetails */ "./resources/js/features/product/components/Aside/SellDetails/SellDetails.js");
function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }






var Aside =
/*#__PURE__*/
function (_React$Component) {
  _inherits(Aside, _React$Component);

  function Aside() {
    _classCallCheck(this, Aside);

    return _possibleConstructorReturn(this, _getPrototypeOf(Aside).apply(this, arguments));
  }

  _createClass(Aside, [{
    key: "render",
    value: function render() {
      var _this = this;

      return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react__WEBPACK_IMPORTED_MODULE_0___default.a.Fragment, null, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "input-group m-3"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__["Link"], {
        to: "/product",
        className: "border px-2"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("i", {
        className: "fas fa-arrow-left fa-2x"
      })), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("input", {
        type: "text",
        className: "form-control ml-2",
        placeholder: "Search..."
      }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "input-group-append"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("button", {
        className: "btn btn-outline-secondary",
        type: "button"
      }, "Enter"))), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("hr", {
        className: "w-100"
      }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__["Switch"], null, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__["Route"], {
        exact: true,
        path: "/product",
        render: function render() {
          return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_SellList_SellList__WEBPACK_IMPORTED_MODULE_1__["default"], _this.props);
        }
      }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_2__["Route"], {
        exact: true,
        path: "/product/:id",
        render: function render() {
          return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_SellDetails_SellDetails__WEBPACK_IMPORTED_MODULE_3__["default"], {
            sells: _this.props.sells
          });
        }
      })));
    }
  }]);

  return Aside;
}(react__WEBPACK_IMPORTED_MODULE_0___default.a.Component);



/***/ }),

/***/ "./resources/js/features/product/components/Aside/SellDetails/SellDetails.js":
/*!***********************************************************************************!*\
  !*** ./resources/js/features/product/components/Aside/SellDetails/SellDetails.js ***!
  \***********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router-dom/esm/react-router-dom.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var _cart_store_actions__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../cart/store/actions */ "./resources/js/features/cart/store/actions.js");
function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }






var SelectQuantity = function SelectQuantity(_ref) {
  var quantity = _ref.quantity,
      cart = _ref.cart,
      id = _ref.id;

  var inCart = function inCart(element) {
    return element.id === id;
  };

  var tempo = cart.data.some(inCart) ? quantity - cart.data[id - 1].quantityCart : quantity;
  var select = [];
  tempo == 0 ? select.push(react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("option", {
    value: "0"
  }, "Plus de stock")) : '';

  for (var i = 1; i <= tempo; i++) {
    select.push(react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("option", {
      value: i
    }, i));
  }

  return select;
};

var Sell =
/*#__PURE__*/
function (_React$Component) {
  _inherits(Sell, _React$Component);

  function Sell(props) {
    var _this;

    _classCallCheck(this, Sell);

    _this = _possibleConstructorReturn(this, _getPrototypeOf(Sell).call(this, props));
    _this.input = react__WEBPACK_IMPORTED_MODULE_0___default.a.createRef();
    _this.sell = _this.props.sell;

    _this.add = function () {
      var inCart = function inCart(element) {
        return element.id === _this.sell.id;
      };

      _this.props.cart.data.some(inCart) ? _this.props.AddQuantity(_this.sell.id - 1, _this.input.current.value) : _this.props.addProduct(_objectSpread({}, _this.sell), _this.input.current.value);
    };

    return _this;
  }

  _createClass(Sell, [{
    key: "render",
    value: function render() {
      return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "text-center border p-2"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("img", {
        alt: this.sell.name,
        src: this.sell.img,
        width: "200"
      }), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("h4", null, this.sell.name), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "border"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, " ", this.sell.description, " "), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, " ", this.sell.prix_unit, " \u20AC l'unit\xE9 "), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
        className: "-d-flex flex-sm-row align-items-baseline m-2"
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("button", {
        type: "button",
        className: "btn btn-sm btn-info mx-1 ",
        onClick: this.add
      }, "Ajouter au panier"), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("select", {
        ref: this.input
      }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(SelectQuantity, {
        quantity: this.sell.quantity,
        cart: this.props.cart,
        id: this.sell.id
      })))));
    }
  }]);

  return Sell;
}(react__WEBPACK_IMPORTED_MODULE_0___default.a.Component);

var SellDetails = function SellDetails(_ref2) {
  var sells = _ref2.sells,
      addProduct = _ref2.addProduct,
      cart = _ref2.cart,
      AddQuantity = _ref2.AddQuantity;

  var _useParams = Object(react_router_dom__WEBPACK_IMPORTED_MODULE_1__["useParams"])(),
      id = _useParams.id;

  var sell = sells[id - 1];
  return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(Sell, {
    sell: sell,
    addProduct: addProduct,
    cart: cart,
    AddQuantity: AddQuantity
  });
};

/* harmony default export */ __webpack_exports__["default"] = (Object(react_redux__WEBPACK_IMPORTED_MODULE_2__["connect"])(function (state) {
  var cart = state.cart;
  return {
    cart: cart
  };
}, {
  addProduct: _cart_store_actions__WEBPACK_IMPORTED_MODULE_3__["addProduct"],
  AddQuantity: _cart_store_actions__WEBPACK_IMPORTED_MODULE_3__["AddQuantity"]
})(SellDetails));

/***/ }),

/***/ "./resources/js/features/product/components/Aside/SellList/SellElement/SellElement.js":
/*!********************************************************************************************!*\
  !*** ./resources/js/features/product/components/Aside/SellList/SellElement/SellElement.js ***!
  \********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_router_dom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-router-dom */ "./node_modules/react-router-dom/esm/react-router-dom.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");




var SellElement = function SellElement(_ref) {
  var sell = _ref.sell,
      selectedSell = _ref.selectedSell,
      addProduct = _ref.addProduct,
      selectSell = _ref.selectSell;
  return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("li", {
    onClick: function onClick() {
      return selectSell(sell.id);
    },
    className: "list-group-item list-group-item-action"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "d-flex w-100 justify-content-between align-items-center"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("h5", {
    className: "mb-1"
  }, sell.name), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("small", {
    className: "border p-3"
  }, sell.prix_unit, " \u20AC / unit\xE9")), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, sell.tags.map(function (t, i) {
    return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
      key: i,
      className: "badge badge-pill badge-primary"
    }, t.name);
  })), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("small", null, "Produit vendu par ", sell.user.name), selectedSell === sell.id - 1 ? react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react__WEBPACK_IMPORTED_MODULE_0___default.a.Fragment, null, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("p", {
    className: "mb-1"
  }, sell.description)) : '', react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "d-flex w-100 justify-content-end"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("small", null, "Il en reste : ", sell.quantity)), selectedSell === sell.id - 1 ? react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react__WEBPACK_IMPORTED_MODULE_0___default.a.Fragment, null, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_router_dom__WEBPACK_IMPORTED_MODULE_1__["Link"], {
    to: "/product/" + sell.id,
    className: "d-block"
  }, "Voir le produit")) : '');
};

/* harmony default export */ __webpack_exports__["default"] = (Object(react_redux__WEBPACK_IMPORTED_MODULE_2__["connect"])()(SellElement));

/***/ }),

/***/ "./resources/js/features/product/components/Aside/SellList/SellList.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/features/product/components/Aside/SellList/SellList.js ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _SellElement_SellElement__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SellElement/SellElement */ "./resources/js/features/product/components/Aside/SellList/SellElement/SellElement.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");
/* harmony import */ var _cart_store_actions__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../cart/store/actions */ "./resources/js/features/cart/store/actions.js");





var SellList = function SellList(props) {
  return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("ul", {
    className: "list-group p-3 mr-n4 scroll"
  }, props.sells.map(function (s, i) {
    return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_SellElement_SellElement__WEBPACK_IMPORTED_MODULE_1__["default"], {
      key: i,
      sell: s,
      selectedSell: props.selectedSell,
      selectSell: props.selectSell,
      addProduct: props.addProduct
    });
  }));
};

/* harmony default export */ __webpack_exports__["default"] = (Object(react_redux__WEBPACK_IMPORTED_MODULE_2__["connect"])(null, {
  addProduct: _cart_store_actions__WEBPACK_IMPORTED_MODULE_3__["addProduct"]
})(SellList));

/***/ }),

/***/ "./resources/js/features/product/components/Map/Map.js":
/*!*************************************************************!*\
  !*** ./resources/js/features/product/components/Map/Map.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var leaflet_dist_leaflet_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! leaflet/dist/leaflet.css */ "./node_modules/leaflet/dist/leaflet.css");
/* harmony import */ var leaflet_dist_leaflet_css__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(leaflet_dist_leaflet_css__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_leaflet__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-leaflet */ "./node_modules/react-leaflet/es/index.js");




var MapLeaf = function MapLeaf(props) {
  return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_leaflet__WEBPACK_IMPORTED_MODULE_2__["Map"], {
    center: props.position,
    zoom: props.zoom
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_leaflet__WEBPACK_IMPORTED_MODULE_2__["TileLayer"], {
    attribution: "&copy <a href=\"http://osm.org/copyright\">OpenStreetMap</a> contributors",
    url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
  }), props.sells.map(function (s, i) {
    return react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_leaflet__WEBPACK_IMPORTED_MODULE_2__["Marker"], {
      key: i,
      position: [s.lat, s["long"]],
      OnClick: function OnClick() {
        props.selectSell(s.id);
      }
    }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(react_leaflet__WEBPACK_IMPORTED_MODULE_2__["Popup"], null, s.name));
  }));
};

/* harmony default export */ __webpack_exports__["default"] = (MapLeaf);

/***/ }),

/***/ "./resources/js/features/product/index.js":
/*!************************************************!*\
  !*** ./resources/js/features/product/index.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _components_Aside_Aside__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/Aside/Aside */ "./resources/js/features/product/components/Aside/Aside.js");
/* harmony import */ var _components_Map_Map__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/Map/Map */ "./resources/js/features/product/components/Map/Map.js");
/* harmony import */ var react_redux__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react-redux */ "./node_modules/react-redux/es/index.js");





var Product = function Product(props) {
  return props.loaded ? react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "d-flex flex-column flex-sm-row"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "col col-sm-4"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_components_Aside_Aside__WEBPACK_IMPORTED_MODULE_1__["default"], {
    sells: props.sells,
    selectedSell: props.selectedSell,
    selectSell: props.selectSell
  })), react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", {
    className: "col col-sm-8"
  }, react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement(_components_Map_Map__WEBPACK_IMPORTED_MODULE_2__["default"], {
    position: props.position,
    sells: props.sells,
    zoom: props.zoom,
    selectSell: props.selectSell
  }))) : react__WEBPACK_IMPORTED_MODULE_0___default.a.createElement("div", null, "Loading...");
};

/* harmony default export */ __webpack_exports__["default"] = (Object(react_redux__WEBPACK_IMPORTED_MODULE_3__["connect"])(function (state) {
  var cart = state.cart;
  return {
    cart: cart
  };
})(Product));

/***/ })

}]);