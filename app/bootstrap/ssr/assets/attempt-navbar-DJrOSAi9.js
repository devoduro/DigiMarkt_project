import { jsxs, Fragment, jsx } from "react/jsx-runtime";
import { A as AppLogo } from "./app-logo-42nmPdEQ.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { u as useScreen } from "./use-screen-B7SDA5zE.js";
import { c as cn } from "./utils-BmtPBcb0.js";
import { Link } from "@inertiajs/react";
import { Minimize, Maximize } from "lucide-react";
import { useState, useEffect } from "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "clsx";
import "tailwind-merge";
const AttemptNavbar = ({ attempt, questionIndex }) => {
  const { screen } = useScreen();
  const [isSticky, setIsSticky] = useState(false);
  const [isMenuOpen, setIsMenuOpen] = useState(false);
  const [isFullscreen, setIsFullscreen] = useState(false);
  attempt.exam.questions || [];
  useEffect(() => {
    const handleScroll = () => {
      const scrollPosition = window.scrollY;
      if (scrollPosition > 100) {
        setIsSticky(true);
      } else {
        setIsSticky(false);
      }
    };
    window.addEventListener("scroll", handleScroll);
    return () => {
      window.removeEventListener("scroll", handleScroll);
    };
  }, []);
  const toggleFullscreen = () => {
    var _a, _b, _c;
    if (!isFullscreen) {
      (_b = (_a = document.documentElement).requestFullscreen) == null ? void 0 : _b.call(_a);
    } else {
      (_c = document.exitFullscreen) == null ? void 0 : _c.call(document);
    }
    setIsFullscreen(!isFullscreen);
  };
  return /* @__PURE__ */ jsxs(Fragment, { children: [
    /* @__PURE__ */ jsx("div", { className: cn("fixed top-0 z-30 w-full", isMenuOpen && "bg-background"), children: /* @__PURE__ */ jsx(
      "div",
      {
        className: cn(
          "gap-1 !px-4 transition-all duration-200 md:gap-6",
          isSticky && "bg-background shadow-card mx-auto w-full",
          screen < 768 && "rounded-none"
        ),
        children: /* @__PURE__ */ jsxs("div", { className: "container flex items-center justify-between", children: [
          /* @__PURE__ */ jsx("div", { className: "flex h-[72px] items-center gap-2", children: /* @__PURE__ */ jsx(Link, { href: "/", children: /* @__PURE__ */ jsx(AppLogo, {}) }) }),
          screen > 768 && /* @__PURE__ */ jsx("h1", { className: "text-xl font-bold", children: attempt.exam.title }),
          /* @__PURE__ */ jsx("div", { className: "flex items-center gap-3", children: /* @__PURE__ */ jsx(Button, { variant: "outline", size: "sm", onClick: toggleFullscreen, children: isFullscreen ? /* @__PURE__ */ jsx(Minimize, { className: "h-4 w-4" }) : /* @__PURE__ */ jsx(Maximize, { className: "h-4 w-4" }) }) })
        ] })
      }
    ) }),
    /* @__PURE__ */ jsx("div", { className: "relative z-20 h-[72px] bg-transparent" })
  ] });
};
export {
  AttemptNavbar as default
};
