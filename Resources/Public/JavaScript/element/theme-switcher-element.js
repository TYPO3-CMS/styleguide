/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
var __decorate=function(e,t,o,l){var r,c=arguments.length,i=c<3?t:null===l?l=Object.getOwnPropertyDescriptor(t,o):l;if("object"==typeof Reflect&&"function"==typeof Reflect.decorate)i=Reflect.decorate(e,t,o,l);else for(var n=e.length-1;n>=0;n--)(r=e[n])&&(i=(c<3?r(i):c>3?r(t,o,i):r(t,o))||i);return c>3&&i&&Object.defineProperty(t,o,i),i};import{customElement,property}from"lit/decorators.js";import{html,LitElement}from"lit";import{lll}from"@typo3/core/lit-helper.js";import"@typo3/backend/element/icon-element.js";const selectorConverter={fromAttribute:e=>document.querySelector(e)};let ThemeSwitcherElement=class extends LitElement{constructor(){super(...arguments),this.activeTheme="light",this.themes={auto:{icon:"actions-circle-half",label:"colorScheme.auto"},light:{icon:"actions-brightness-high",label:"colorScheme.light"},dark:{icon:"actions-moon",label:"colorScheme.dark"}}}createRenderRoot(){return this}render(){const e=html`<span class="text-primary"><typo3-backend-icon identifier="actions-dot" size="small"></typo3-backend-icon></span>`,t=html`<typo3-backend-icon identifier="miscellaneous-placeholder" size="small"></typo3-backend-icon>`,o=[];for(const[l,r]of Object.entries(this.themes))o.push(html`
        <li>
          <a class="dropdown-item dropdown-item-spaced" href="#" data-theme="${l}" @click="${this.setTheme}">
            ${l===this.activeTheme?e:t}
            ${lll(r.label)}
          </a>
        </li>
      `);return html`
      <div class="colorscheme-switch">
        ${lll("colorScheme.selector.label")}
        <div class="dropdown">
          <button class="btn btn-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <typo3-backend-icon identifier="${this.themes[this.activeTheme].icon}" size="small"></typo3-backend-icon> ${lll(this.themes[this.activeTheme].label)}
          </button>
          <ul class="dropdown-menu">
            ${o}
          </ul>
        </div>
      </div>
    `}setTheme(e){this.activeTheme=e.target.dataset.theme,this.example.dataset.colorScheme=this.activeTheme}};__decorate([property()],ThemeSwitcherElement.prototype,"activeTheme",void 0),__decorate([property({converter:selectorConverter})],ThemeSwitcherElement.prototype,"example",void 0),ThemeSwitcherElement=__decorate([customElement("typo3-styleguide-theme-switcher")],ThemeSwitcherElement);export{ThemeSwitcherElement};