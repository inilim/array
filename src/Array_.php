<?php

namespace Inilim\Array;

use Closure;
use ArrayAccess;
use InvalidArgumentException;

/**
 * Laravel Helpers Package
 */
class Array_
{
   /**
    * проверка на многомерный массив
    * true - многомерный
    * false - одномерный
    */
   public function isMultidimensional(array $arr): bool
   {
      return (\sizeof($arr) - \sizeof($arr, COUNT_RECURSIVE)) !== 0;
   }

   /**
    * Return the default value of the given value.
    *
    * @param  mixed $value
    * @return mixed
    */
   public function value($value)
   {
      return $value instanceof Closure ? $value() : $value;
   }

   /**
    * Determine whether the given value is array accessible.
    *
    * @param  mixed  $value
    *
    * @return bool
    */
   public function accessible($value): bool
   {
      return \is_array($value) || $value instanceof ArrayAccess;
   }

   /**
    * Add an element to an array using "dot" notation if it doesn't exist.
    *
    * @param  array  $array
    * @param  string  $key
    * @param  mixed  $value
    *
    * @return array
    */
   public function add(array $array, string $key, $value): array
   {
      if ($this->get($array, $key) === null) {
         $this->set($array, $key, $value);
      }

      return $array;
   }

   /**
    * Collapse an array of arrays into a single array.
    *
    * @param  iterable  $array
    *
    * @return array
    */
   public function collapse(iterable $array): array
   {
      $results = [];

      foreach ($array as $values) {
         if (!\is_array($values)) {
            continue;
         }

         $results[] = $values;
      }

      return \array_merge([], ...$results);
   }

   /**
    * Cross join the given arrays, returning all possible permutations.
    *
    * @param  iterable  ...$arrays
    *
    * @return array
    */
   public function crossJoin(...$arrays): array
   {
      $results = [[]];

      foreach ($arrays as $index => $array) {
         $append = [];

         foreach ($results as $product) {
            foreach ($array as $item) {
               $product[$index] = $item;

               $append[] = $product;
            }
         }

         $results = $append;
      }

      return $results;
   }

   /**
    * Join all items using a string. The final items can use a separate glue string.
    */
   public function join(array $array, string $glue, string $final_glue = ''): string
   {
      if ($final_glue === '') return \implode($glue, $array);

      if (!$array) return '';
      if (\sizeof($array) === 1) return \end($array);

      $finalItem = \array_pop($array);

      return \implode($glue, $array) . $final_glue . $finalItem;
   }

   /**
    * Convert the array into a query string.
    */
   public function query(array $array): string
   {
      return \http_build_query($array, '', '&', \PHP_QUERY_RFC3986);
   }

   /**
    * Prepend the key names of an associative array.
    */
   public function prependKeysWith(array $array, string $prepend_with): array
   {
      return $this->mapWithKeys($array, fn ($item, $key) => [$prepend_with . $key => $item]);
   }

   /**
    * Run an associative map over each of the items.
    *
    * The callback should return an associative array with a single key/value pair.
    *
    * @template TKey
    * @template TValue
    * @template TMapWithKeysKey of array-key
    * @template TMapWithKeysValue
    *
    * @param  array<TKey, TValue>  $array
    * @param  callable(TValue, TKey): array<TMapWithKeysKey, TMapWithKeysValue>  $callback
    * @return array
    */
   public function mapWithKeys(array $array, callable $callback): array
   {
      $result = [];

      foreach ($array as $key => $value) {
         $assoc = $callback($value, $key);

         foreach ($assoc as $mapKey => $mapValue) {
            $result[$mapKey] = $mapValue;
         }
      }

      return $result;
   }

   /**
    * Run a map over each of the items in the array.
    */
   public function map(array $array, callable $callback): array
   {
      $keys = \array_keys($array);

      try {
         $items = \array_map($callback, $array, $keys);
      } catch (\ArgumentCountError) {
         $items = \array_map($callback, $array);
      }

      return \array_combine($keys, $items);
   }

   /**
    * Divide an array into two arrays. One with keys and the other with values.
    *
    * @param  array  $array
    *
    * @return array
    */
   public function divide(array $array): array
   {
      return [\array_keys($array), \array_values($array)];
   }

   /**
    * Flatten a multi-dimensional associative array with dots.
    *
    * @param  iterable  $array
    * @param  string  $prepend
    *
    * @return array
    */
   public function dot(iterable $array, string $prepend = ''): array
   {
      $results = [];

      foreach ($array as $key => $value) {
         if (\is_array($value) && !empty($value)) {
            $results = \array_merge($results, $this->dot($value, $prepend . $key . '.'));
         } else {
            $results[$prepend . $key] = $value;
         }
      }

      return $results;
   }

   /**
    * Get all of the given array except for a specified array of keys.
    *
    * @param  array  $array
    * @param  array|string  $keys
    *
    * @return array
    */
   public function except(array $array, $keys): array
   {
      $this->forget($array, $keys);

      return $array;
   }

   /**
    * Determine if the given key exists in the provided array.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|int  $key
    *
    * @return bool
    */
   public function exists($array, $key): bool
   {
      if ($array instanceof ArrayAccess) {
         return $array->offsetExists($key);
      }

      return \array_key_exists($key, $array);
   }

   /**
    * Flatten a multi-dimensional array into a single level.
    *
    * @param  iterable  $array
    * @param  int  $depth
    *
    * @return array
    */
   public function flatten(iterable $array, int $depth): array
   {
      $result = [];

      foreach ($array as $item) {
         if (!\is_array($item)) {
            $result[] = $item;
         } else {
            $values = $depth === 1
               ? \array_values($item)
               : $this->flatten($item, $depth - 1);

            foreach ($values as $value) {
               $result[] = $value;
            }
         }
      }

      return $result;
   }

   /**
    * Remove one or many array items from a given array using "dot" notation.
    *
    * @param  array  $array
    * @param  array|string  $keys
    *
    * @return void
    */
   public function forget(array &$array, $keys)
   {
      $original = &$array;

      $keys = (array) $keys;

      if (!$keys) return;

      foreach ($keys as $key) {
         // if the exact key exists in the top-level, remove it
         if ($this->exists($array, $key)) {
            unset($array[$key]);

            continue;
         }

         $parts = \explode('.', $key);

         // clean up before each pass
         $array = &$original;

         while (\sizeof($parts) > 1) {
            $part = \array_shift($parts);

            if (isset($array[$part]) && \is_array($array[$part])) {
               $array = &$array[$part];
            } else {
               continue 2;
            }
         }

         unset($array[\array_shift($parts)]);
      }
   }

   /**
    * Get an item from an array using "dot" notation.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|int|null  $key
    * @param  mixed  $default
    *
    * @return mixed
    */
   public function get($array, $key, $default = null)
   {
      if (!$this->accessible($array)) {
         return $this->value($default);
      }

      if ($key === null) {
         return $array;
      }

      if ($this->exists($array, $key)) {
         return $array[$key];
      }

      if (\strpos(\strval($key), '.') === false) {
         return $array[$key] ?? $this->value($default);
      }

      foreach (\explode('.', \strval($key)) as $segment) {
         if ($this->accessible($array) && $this->exists($array, $segment)) {
            $array = $array[$segment];
         } else {
            return $this->value($default);
         }
      }

      return $array;
   }

   /**
    * Check if an item or items exist in an array using "dot" notation.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|array  $keys
    *
    * @return bool
    */
   public function has($array, $keys): bool
   {
      $keys = (array) $keys;

      if (!$array || $keys === []) {
         return false;
      }

      foreach ($keys as $key) {
         $subKeyArray = $array;

         if ($this->exists($array, $key)) {
            continue;
         }

         foreach (\explode('.', $key) as $segment) {
            if ($this->accessible($subKeyArray) && $this->exists($subKeyArray, $segment)) {
               $subKeyArray = $subKeyArray[$segment];
            } else {
               return false;
            }
         }
      }

      return true;
   }

   /**
    * Determine if any of the keys exist in an array using "dot" notation.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|string[]  $keys
    *
    * @return bool
    */
   public function hasAny($array, $keys): bool
   {
      if ($keys === null) {
         return false;
      }

      $keys = (array) $keys;

      if (!$array) {
         return false;
      }

      if ($keys === []) {
         return false;
      }

      foreach ($keys as $key) {
         if ($this->has($array, $key)) {
            return true;
         }
      }

      return false;
   }

   /**
    * Determines if an array is associative.
    *
    * An array is "associative" if it doesn't have sequential numerical keys beginning with zero.
    *
    * @param  array  $array
    *
    * @return bool
    */
   public function isAssoc(array $array): bool
   {
      $keys = \array_keys($array);

      return \array_keys($keys) !== $keys;
   }

   /**
    * Get a subset of the items from the given array.
    *
    * @param  array  $array
    * @param  string[]|string  $keys
    *
    * @return array
    */
   public function only(array $array, $keys): array
   {
      return \array_intersect_key($array, \array_flip((array) $keys));
   }

   /**
    * Pluck an array of values from an array.
    *
    * @param  iterable  $array
    * @param  string|array|int|null  $value
    * @param  string|array|null  $key
    *
    * @return array
    */
   public function pluck(iterable $array, $value, $key = null): array
   {
      $results = [];

      $value = \is_string($value) ? \explode('.', $value) : $value;

      $key = $key === null || \is_array($key) ? $key : \explode('.', $key);

      foreach ($array as $item) {
         $itemValue = $this->dataGet($item, $value);

         // If the key is "null", we will just append the value to the array and keep
         // looping. Otherwise we will key the array using the value of the key we
         // received from the developer. Then we'll return the final array form.
         if ($key === null) {
            $results[] = $itemValue;
         } else {
            $itemKey = $this->dataGet($item, $key);

            if (\is_object($itemKey) && \method_exists($itemKey, '__toString')) {
               $itemKey = (string) $itemKey;
            }

            $results[$itemKey] = $itemValue;
         }
      }

      return $results;
   }

   /**
    * Push an item onto the beginning of an array.
    *
    * @param  array  $array
    * @param  mixed  $value
    * @param  mixed  $key
    *
    * @return array
    */
   public function prepend(array $array, $value, $key = null): array
   {
      if (\func_num_args() === 2) {
         \array_unshift($array, $value);
      } else {
         $array = [$key => $value] + $array;
      }

      return $array;
   }

   /**
    * Get a value from the array, and remove it.
    *
    * @param  array  $array
    * @param  string  $key
    * @param  mixed  $default
    *
    * @return mixed
    */
   public function pull(array &$array, string $key, $default = null)
   {
      $value = $this->get($array, $key, $default);

      $this->forget($array, $key);

      return $value;
   }

   /**
    * Get one or a specified number of random values from an array.
    *
    * @param  array  $array
    * @param  int|null  $number
    * @param  bool|false  $preserveKeys
    *
    * @return mixed
    *
    * @throws \InvalidArgumentException
    */
   public function random(array $array, ?int $number = null, bool $preserveKeys = false)
   {
      $requested = $number === null ? 1 : $number;

      $count = \sizeof($array);

      if ($requested > $count) {
         throw new InvalidArgumentException(
            "You requested {$requested} items, but there are only {$count} items available."
         );
      }

      if ($number === null) {
         return $array[\array_rand($array)];
      }

      if ((int) $number === 0) {
         return [];
      }

      $keys = \array_rand($array, $number);

      $results = [];

      if ($preserveKeys) {
         foreach ((array) $keys as $key) {
            $results[$key] = $array[$key];
         }
      } else {
         foreach ((array) $keys as $key) {
            $results[] = $array[$key];
         }
      }

      return $results;
   }

   /**
    * Set an array item to a given value using "dot" notation.
    *
    * If no key is given to the method, the entire array will be replaced.
    * @param  mixed  $value
    */
   public function set(array &$array, ?string $key, $value): array
   {
      if ($key === null) {
         return $array = $value;
      }

      $keys = \explode('.', $key);

      foreach ($keys as $i => $key) {
         if (\sizeof($keys) === 1) {
            break;
         }

         unset($keys[$i]);

         // If the key doesn't exist at this depth, we will just create an empty array
         // to hold the next value, allowing us to create the arrays to hold final
         // values at the correct depth. Then we'll keep digging into the array.
         if (!isset($array[$key]) || !\is_array($array[$key])) {
            $array[$key] = [];
         }

         $array = &$array[$key];
      }

      $array[\array_shift($keys)] = $value;

      return $array;
   }

   /**
    * Shuffle the given array and return the result.
    */
   public function shuffle(array $array, ?int $seed = null): array
   {
      if ($seed === null) {
         \shuffle($array);
      } else {
         \mt_srand($seed);
         \shuffle($array);
         \mt_srand();
      }

      return $array;
   }

   /**
    * Take the first or last {$limit} items from an array.
    */
   public function take(array $array, int $limit): array
   {
      if ($limit < 0) {
         return \array_slice($array, $limit, \abs($limit));
      }

      return \array_slice($array, 0, $limit);
   }

   /**
    * Convert a flatten "dot" notation array into an expanded array.
    * @param  iterable  $array
    */
   public function undot($array): array
   {
      $results = [];

      foreach ($array as $key => $value) {
         $this->set($results, $key, $value);
      }

      return $results;
   }

   /**
    * Recursively sort an array by keys and values.
    */
   public function sortRecursive(array $array, int $options = \SORT_REGULAR, bool $descending = true): array
   {
      foreach ($array as &$value) {
         if (\is_array($value)) {
            $value = $this->sortRecursive($value, $options, $descending);
         }
      }

      if ($this->isAssoc($array)) {
         $descending
            ? \krsort($array, $options)
            : \ksort($array, $options);
      } else {
         $descending
            ? \rsort($array, $options)
            : \sort($array, $options);
      }

      return $array;
   }

   /**
    * Recursively sort an array by keys and values in descending order.
    */
   public function sortRecursiveDesc(array $array, int $options = \SORT_REGULAR): array
   {
      return $this->sortRecursive($array, $options, true);
   }

   /**
    * Filter the array using the given callback. array_filter
    *
    * @param  array  $array
    * @param  callable  $callback
    * @return array
    */
   public function where(array $array, callable $callback): array
   {
      return \array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
   }

   /**
    * If the given value is not an array and not null, wrap it in one.
    *
    * @param  mixed  $value
    * @return array
    */
   public function wrap($value): array
   {
      if ($value === null) return [];

      return \is_array($value) ? $value : [$value];
   }

   /**
    * Fill in data where it's missing.
    *
    * @param  mixed  $target
    * @param  string|array  $key
    * @param  mixed  $value
    * @return mixed
    */
   public function dataFill(&$target, $key, $value)
   {
      return $this->dataSet($target, $key, $value, false);
   }

   /**
    * Get an item from an array or object using "dot" notation.
    *
    * @param  mixed  $target
    * @param  string|array|int|null  $key
    * @param  mixed  $default
    * @return mixed
    */
   public function dataGet($target, $key, $default = null)
   {
      if ($key === null) {
         return $target;
      }

      $key = \is_array($key) ? $key : \explode('.', $key);

      foreach ($key as $i => $segment) {
         unset($key[$i]);

         if ($segment === null) {
            return $target;
         }

         if ($segment === '*') {
            if (!\is_array($target)) {
               return $this->value($default);
            }

            $result = [];

            foreach ($target as $item) {
               $result[] = $this->dataGet($item, $key);
            }

            return \in_array('*', $key) ? $this->collapse($result) : $result;
         }

         if ($this->accessible($target) && $this->exists($target, $segment)) {
            $target = $target[$segment];
         } elseif (\is_object($target) && isset($target->{$segment})) {
            $target = $target->{$segment};
         } else {
            return $this->value($default);
         }
      }

      return $target;
   }

   /**
    * Set an item on an array or object using dot notation.
    *
    * @param  mixed  $target
    * @param  string|array  $key
    * @param  mixed  $value
    * @param  bool  $overwrite
    *
    * @return mixed
    */
   public function dataSet(&$target, $key, $value, bool $overwrite = true)
   {
      $segments = \is_array($key) ? $key : \explode('.', $key);

      if (($segment = \array_shift($segments)) === '*') {
         if (!$this->accessible($target)) {
            $target = [];
         }

         if ($segments) {
            foreach ($target as &$inner) {
               $this->dataSet($inner, $segments, $value, $overwrite);
            }
         } elseif ($overwrite) {
            foreach ($target as &$inner) {
               $inner = $value;
            }
         }
      } elseif ($this->accessible($target)) {
         if ($segments) {
            if (!$this->exists($target, $segment)) {
               $target[$segment] = [];
            }

            $this->dataSet($target[$segment], $segments, $value, $overwrite);
         } elseif ($overwrite || !$this->exists($target, $segment)) {
            $target[$segment] = $value;
         }
      } elseif (\is_object($target)) {
         if ($segments) {
            if (!isset($target->{$segment})) {
               $target->{$segment} = [];
            }

            $this->dataSet($target->{$segment}, $segments, $value, $overwrite);
         } elseif ($overwrite || !isset($target->{$segment})) {
            $target->{$segment} = $value;
         }
      } else {
         $target = [];

         if ($segments) {
            $this->dataSet($target[$segment], $segments, $value, $overwrite);
         } elseif ($overwrite) {
            $target[$segment] = $value;
         }
      }

      return $target;
   }

   public function isList(array $array): bool
   {
      return \array_is_list($array);
   }

   /**
    * Get the first element of an array. Useful for method chaining.
    *
    * @param  array  $array
    *
    * @return mixed
    */
   public function head(array $array)
   {
      return \reset($array);
   }

   /**
    * Get the last element from an array.
    *
    * @param  array  $array
    *
    * @return mixed
    */
   public function last(array $array)
   {
      return \end($array);
   }
}
