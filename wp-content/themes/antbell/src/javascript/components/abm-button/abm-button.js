import { html, css, LitElement } from 'lit';

class ABMButton extends LitElement {
  static get styles() {
    return [
      css`
        :host {
          position: relative;
          display: inline-block;
          padding: 0.5rem 1rem;
        }

        :host::before,
        :host::after,
        a::before,
        a::after {
          content: '';
          display: inline-block;
          position: absolute;
          transition: all 0.3s ease;
          opacity: 0.4;
          background: #c4c4c4;
        }

        :host::before {
          top: 0;
          right: 100%;
          bottom: auto;
          left: 1px;
          height: 1px;
        }

        :host::after {
          top: 100%;
          left: 100%;
          right: 0;
          height: 1px;
        }

        :host(:hover)::before {
          right: 1px;
        }

        :host(:hover)::after {
          left: 0;
        }

        a {
          font-family: "Fjalla One", sans-serif;
          color: #28ccd2;
          display: inline-block;
          text-decoration: none;
        }

        :host(:hover) a,
        :host([active]) a {
          color: #69ffff;
        }

        a::before {
          top: 0;
          right: auto;
          bottom: 100%;
          width: 1px;
          left: 0;
        }

        a::after {
          top: 0;
          right: 0;
          bottom: 100%;
          left: auto;
          width: 1px;
        }

        :host(:hover) a::before {
          bottom: 1px;
        }

        :host(:hover) a::after {
          bottom: 1px;
        }

        svg {
          width: 20px;
          height: 20px;
          fill: #28ccd2;
          position: relative;
          top: 3px;
          left: 5px
        }

        :host(:hover) svg {
          fill: #69ffff;
        }
      `
    ]
  }

  static get properties() {
    return {
      link: {
        type: String
      },
      caret: {
        type: Boolean,
        reflect: true
      }
    }
  }

  render() {
    return html`
      <a href="${this.link}">
        <slot></slot>
        ${this.makeCaret()}
      </a>
    `;
  }

  makeCaret() {
    if (this.caret) {
      return html`
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="20" viewBox="0 0 20 20" width="20"><path d="M5.79681 7C4.95612 7 4.49064 7.97434 5.01887 8.62834L8.83333 13.351C9.43371 14.0943 10.5668 14.0943 11.1672 13.351L14.9816 8.62834C15.5098 7.97434 15.0444 7 14.2037 7H5.79681Z" /></svg>
        </span>
      `
    }
  }
}

window.customElements.define('abm-button', ABMButton);
