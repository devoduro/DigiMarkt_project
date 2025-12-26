import { jsx, jsxs } from "react/jsx-runtime";
import { closeBrackets, autocompletion, completionKeymap, closeBracketsKeymap } from "@codemirror/autocomplete";
import { history, defaultKeymap, historyKeymap } from "@codemirror/commands";
import { css } from "@codemirror/lang-css";
import { syntaxHighlighting, HighlightStyle, bracketMatching } from "@codemirror/language";
import { highlightSelectionMatches } from "@codemirror/search";
import { EditorState } from "@codemirror/state";
import { EditorView, lineNumbers, highlightActiveLine, highlightActiveLineGutter, keymap } from "@codemirror/view";
import { useRef, useEffect } from "react";
import { tags } from "@lezer/highlight";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { C as Card, a as CardHeader, c as CardTitle, d as CardDescription, b as CardContent } from "./card-D8SB2yrw.js";
import { S as Separator } from "./separator-R7EO2G8T.js";
import { usePage, useForm } from "@inertiajs/react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-separator";
const themeConfig = EditorView.theme({
  "&": {
    color: "inherit",
    fontSize: "90%",
    backgroundColor: "inherit",
    outline: "none !important",
    display: "block !important",
    width: "100%",
    minHeight: "inherit",
    cursor: "text",
    height: "100%"
  },
  ".cm-content": {
    lineHeight: 1.75,
    fontFamily: "var(--font-mono)",
    // Ensure caret is visible against dark backgrounds
    caretColor: "hsl(var(--foreground, 0 0% 100%))",
    padding: "10px 0"
  },
  ".cm-scroller": {
    minHeight: "inherit",
    height: "100%"
  },
  // Make caret and selections visible in dark mode
  ".cm-cursor": {
    borderLeftColor: "inherit"
  },
  "&.cm-focused .cm-selectionBackground, .cm-selectionBackground, ::selection": {
    backgroundColor: "rgba(59, 130, 246, 0.25)"
    // blue-500/25
  },
  ".cm-gutters": {
    color: "inherit",
    backgroundColor: "inherit",
    borderRight: "unset"
  },
  ".cm-lineNumbers .cm-gutterElement": {
    paddingRight: "24px",
    opacity: "75%"
  },
  ".cm-lineWrapping ": {
    wordBreak: "break-all !important"
  },
  // Autocomplete tooltip styling that adapts to app theme tokens
  ".cm-tooltip": {
    backgroundColor: "hsl(var(--popover, 0 0% 10%))",
    color: "hsl(var(--popover-foreground, 0 0% 98%))",
    border: "1px solid hsl(var(--border, 0 0% 25%))",
    boxShadow: "0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1)",
    zIndex: 60
  },
  ".cm-tooltip-autocomplete": {
    "& > ul": { maxHeight: "240px", overflow: "auto" }
  },
  ".cm-tooltip-autocomplete ul li": {
    padding: "6px 8px"
  },
  ".cm-tooltip-autocomplete ul li[aria-selected]": {
    backgroundColor: "hsl(var(--accent, 0 0% 20%))",
    color: "hsl(var(--accent-foreground, 0 0% 98%))"
  },
  // Highlight of matching text in the autocomplete suggestion list
  ".cm-completionMatchedText": {
    color: "#60a5fa",
    // tailwind sky-400
    fontWeight: 600,
    textDecoration: "none"
  }
});
const highlightStyle = HighlightStyle.define([
  { tag: [tags.comment], color: "#64748b" },
  // slate-500
  { tag: [tags.keyword, tags.typeName, tags.typeOperator], color: "#7c3aed", fontWeight: "500" },
  // violet-600
  { tag: [tags.string, tags.meta, tags.regexp], color: "#16a34a" },
  // green-600
  { tag: [tags.number, tags.bool], color: "#ea580c" },
  // orange-600
  { tag: [tags.operator, tags.name], color: "#0ea5e9" },
  // sky-500
  { tag: [tags.variableName, tags.attributeName, tags.propertyName], color: "#0ea5e9" },
  { tag: [tags.className], color: "#22d3ee" },
  // cyan-400
  { tag: [tags.tagName], color: "#e11d48" },
  // rose-600
  { tag: [tags.heading, tags.strong], color: "#111827", fontWeight: "bold" },
  { tag: [tags.emphasis], color: "#111827", fontStyle: "italic" },
  { tag: [tags.link], textDecoration: "underline" },
  { tag: [tags.strikethrough], textDecoration: "line-through" },
  { tag: [tags.invalid], color: "#ef4444" }
  // red-500
]);
const theme = [themeConfig, syntaxHighlighting(highlightStyle)];
const CssEditor = ({ value, setValue }) => {
  const editorRef = useRef(null);
  const viewRef = useRef(null);
  useEffect(() => {
    if (!editorRef.current) return;
    const startDoc = value || "";
    const state = EditorState.create({
      doc: startDoc,
      extensions: [
        lineNumbers(),
        highlightActiveLine(),
        highlightActiveLineGutter(),
        css(),
        theme,
        history(),
        bracketMatching(),
        closeBrackets(),
        autocompletion(),
        highlightSelectionMatches(),
        keymap.of([...defaultKeymap, ...historyKeymap, ...completionKeymap, ...closeBracketsKeymap]),
        EditorView.updateListener.of((v) => {
          if (v.docChanged) {
            const value2 = v.state.doc.toString();
            setValue(value2);
          }
        }),
        EditorView.lineWrapping
      ]
    });
    const view = new EditorView({ state, parent: editorRef.current });
    viewRef.current = view;
    return () => view.destroy();
  }, [editorRef]);
  return /* @__PURE__ */ jsx(
    "div",
    {
      ref: editorRef,
      className: "h-[420px] w-full rounded-md border",
      onMouseDown: (e) => {
        var _a;
        const target = e.target;
        if (!target.closest(".cm-editor")) {
          e.preventDefault();
          (_a = viewRef.current) == null ? void 0 : _a.focus();
        }
      }
    }
  );
};
const Style = () => {
  const { props } = usePage();
  const { translate } = props;
  const { settings, button } = translate;
  const initialFields = props.system.fields;
  const { data, setData, post, errors, processing } = useForm({
    ...props.system.fields,
    global_style: initialFields.global_style
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("settings.system.update", { id: props.system.id }), {
      showProgress: false,
      preserveScroll: true
    });
  };
  return /* @__PURE__ */ jsxs(Card, { children: [
    /* @__PURE__ */ jsxs(CardHeader, { className: "p-4 sm:p-6", children: [
      /* @__PURE__ */ jsx(CardTitle, { className: "flex items-center gap-2", children: settings.custom_global_style }),
      /* @__PURE__ */ jsx(CardDescription, { className: "hidden sm:block", children: settings.css_description })
    ] }),
    /* @__PURE__ */ jsx(Separator, {}),
    /* @__PURE__ */ jsx(CardContent, { className: "p-4 sm:p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-6", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(CssEditor, { value: data.global_style, setValue: (value) => setData("global_style", value) }),
        /* @__PURE__ */ jsx(InputError, { message: errors.global_style })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "flex justify-end", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, type: "submit", children: button.save_changes }) })
    ] }) })
  ] });
};
export {
  Style as default
};
