import { jsxs, jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { GripVertical, ArrowUp, ArrowDown } from "lucide-react";
import { useMemo, useState, useEffect } from "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const OrderingQuestion = ({ question, answer, onAnswerChange }) => {
  var _a, _b;
  const rawItems = ((_a = question.options) == null ? void 0 : _a.items) || [];
  const items = useMemo(() => {
    return rawItems.map((item, index) => {
      if (typeof item === "string") {
        return { id: index, text: item };
      }
      if (item && typeof item === "object") {
        const text = typeof item.text === "string" ? item.text : typeof item.label === "string" ? item.label : "";
        return { id: index, text };
      }
      return { id: index, text: "" };
    });
  }, [rawItems]);
  const defaultOrderedItems = useMemo(() => {
    var _a2;
    const buildFromOrder = (order) => {
      if (!order || order.length !== items.length) {
        return null;
      }
      const uniqueCount = new Set(order).size;
      if (uniqueCount !== items.length) {
        return null;
      }
      const mapped = order.map((id) => items.find((item) => item.id === Number(id))).filter((item) => Boolean(item));
      return mapped.length === items.length ? mapped : null;
    };
    const fromAnswer = buildFromOrder(answer == null ? void 0 : answer.order);
    if (fromAnswer) {
      return fromAnswer;
    }
    const fromCorrectOrder = buildFromOrder((_a2 = question.options) == null ? void 0 : _a2.correct_order);
    if (fromCorrectOrder) {
      return fromCorrectOrder;
    }
    return [...items].sort(() => Math.random() - 0.5);
  }, [answer == null ? void 0 : answer.order, (_b = question.options) == null ? void 0 : _b.correct_order, items]);
  const [orderedItems, setOrderedItems] = useState(defaultOrderedItems);
  useEffect(() => {
    setOrderedItems(defaultOrderedItems);
  }, [defaultOrderedItems]);
  const updateAnswer = (newItems) => {
    setOrderedItems(newItems);
    onAnswerChange({
      order: newItems.map((item) => item.id)
    });
  };
  const moveItem = (index, direction) => {
    if (direction === "up" && index === 0 || direction === "down" && index === orderedItems.length - 1) {
      return;
    }
    const newItems = [...orderedItems];
    const swapIndex = direction === "up" ? index - 1 : index + 1;
    [newItems[index], newItems[swapIndex]] = [newItems[swapIndex], newItems[index]];
    updateAnswer(newItems);
  };
  const shuffleItems = () => {
    const shuffled = [...orderedItems].sort(() => Math.random() - 0.5);
    updateAnswer(shuffled);
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
      /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Arrange the following items in the correct order:" }),
      /* @__PURE__ */ jsx(Button, { variant: "ghost", size: "sm", onClick: shuffleItems, children: "Shuffle" })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "space-y-2", children: orderedItems.map((item, index) => /* @__PURE__ */ jsx(Card, { className: "p-4", children: /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-3", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center gap-2", children: [
        /* @__PURE__ */ jsx(GripVertical, { className: "h-5 w-5 text-gray-400" }),
        /* @__PURE__ */ jsx("div", { className: "bg-primary flex h-8 w-8 items-center justify-center rounded-full text-sm font-semibold text-white", children: index + 1 })
      ] }),
      /* @__PURE__ */ jsx("div", { className: "flex-1", children: /* @__PURE__ */ jsx("p", { className: "font-medium", children: item.text }) }),
      /* @__PURE__ */ jsxs("div", { className: "flex gap-1", children: [
        /* @__PURE__ */ jsx(Button, { variant: "outline", size: "sm", onClick: () => moveItem(index, "up"), disabled: index === 0, children: /* @__PURE__ */ jsx(ArrowUp, { className: "h-4 w-4" }) }),
        /* @__PURE__ */ jsx(Button, { variant: "outline", size: "sm", onClick: () => moveItem(index, "down"), disabled: index === orderedItems.length - 1, children: /* @__PURE__ */ jsx(ArrowDown, { className: "h-4 w-4" }) })
      ] })
    ] }) }, item.id)) }),
    /* @__PURE__ */ jsxs("p", { className: "text-sm text-gray-600", children: [
      /* @__PURE__ */ jsx("span", { className: "font-semibold", children: "Tip:" }),
      " Use the arrow buttons to move items up or down."
    ] })
  ] });
};
export {
  OrderingQuestion as default
};
