import barba from "@barba/core";
import gsap from "gsap";
import videoSource from "./mainVideo";
// import ScrollOut from 'scroll-out';
import initImageSlide from "./initImageSlide";
import { animationLeave, animationEnter, mobileMenuOff } from "../animations";

// const calculateLeftPosition = windowHeight => {
// 	return parseFloat(windowHeight * Math.tan((27 * Math.PI) / 180));
// };

function delay(n) {
  n = n || 2000;
  return new Promise((done) => {
    setTimeout(() => {
      done();
    }, n);
  });
}

function loadOnce(next) {
  document.querySelector("main").classList.add("loading");
  var tl = gsap.timeline();

  tl.to(".loader__logo__bottom", {
    duration: 1.5,
    opacity: 1,
    ease: "power4.in",
  })
    .from(".loader__logo__top > img", {
      duration: 0.5,
      yPercent: 100,
      stagger: 0.1,
      delay: 0.2,
    })
    .to(".loader__logo", {
      duration: 0.3,
      delay: 1.1,
      autoAlpha: 0,
      ease: "power1.out",
      onComplete: () =>
        document.querySelector("main").classList.remove("loading"),
    })
    .to(
      ".loader",
      {
        duration: 0.4,
        width: 0,
        ease: "power1.out",
        onStart: () => animationEnter(next.container),
      },
      "-=0.2"
    );
}

barba.hooks.enter(() => {
  window.scrollTo(0, 0);
});

barba.hooks.after(() => {
  ga("set", "page", window.location.pathname);
  ga("send", "pageview");
});

barba.init({
  sync: true,
  views: [
    {
      namespace: "detail",
      beforeEnter() {
        initImageSlide();
      },
      once() {
        loadOnce();
      },
      enter() {
        gsap.to(".page-body", { autoAlpha: 1, duration: 0.5 });
      },
    },
    {
      namespace: "home",
      beforeEnter() {
        videoSource();
      },
      once({ next }) {
        loadOnce(next);
      },
      enter() {
        gsap.to(".page-body", { autoAlpha: 1, duration: 0.5 });
      },
    },
    {
      namespace: "about",
      beforeEnter() {
        // ScrollOut();
      },
      once({ next }) {
        loadOnce(next);
      },
    },
  ],
  transitions: [
    {
      name: "general-transition",
      async once({ next }) {
        loadOnce(next);
      },

      async leave({ current }) {
        const done = this.async();
        animationLeave(current.container);
        await delay(1000);
        done();
      },

      enter({ next }) {
        mobileMenuOff();
        animationEnter(next.container);
        document.querySelector(".menu-btn-container").classList.remove("open");
      },
    },
    {
      name: "from-news-to-news",
      from: {
        namespace: ["news"],
      },
      to: {
        namespace: ["news"],
      },
      leave: () => {
        gsap.to(".page-body", { autoAlpha: 0, duration: 0.5 });
      },
      enter() {
        gsap.to(".page-body", { autoAlpha: 1, duration: 1 });
      },
    },
    {
      name: "from-recruit-to-recruit",
      from: {
        namespace: ["recruit"],
      },
      to: {
        namespace: ["recruit"],
      },
      leave: () => {
        gsap.to(".page-body", { autoAlpha: 0, duration: 0.5 });
      },
      enter() {
        gsap.to(".page-body", { autoAlpha: 1, duration: 1 });
      },
    },
  ],
});
