<?php

namespace Inilim\Array;

use Inilim\LazyMethod\LazyMethodAbstract;

/**
 * @method  bool accessible(mixed $value) 
 * @method  static  bool accessible(mixed $value) 
 * @param \Inilim\Array\Method\accessible
 * 
 * @method  array add(array $array, string $key, mixed $value) 
 * @method  static  array add(array $array, string $key, mixed $value) 
 * @param \Inilim\Array\Method\add
 * 
 * @method  array collapse(iterable $array) 
 * @method  static  array collapse(iterable $array) 
 * @param \Inilim\Array\Method\collapse
 * 
 * @method  array crossJoin(iterable ... $arrays) 
 * @method  static  array crossJoin(iterable ... $arrays) 
 * @param \Inilim\Array\Method\crossJoin
 * 
 * @method  mixed dataFill(mixed $target, string|string[] $key, mixed $value) 
 * @method  static  mixed dataFill(mixed $target, string|string[] $key, mixed $value) 
 * @param \Inilim\Array\Method\dataFill
 * 
 * @method  mixed dataGet(mixed $target, string|array|int|null $key, mixed $default = null) 
 * @method  static  mixed dataGet(mixed $target, string|array|int|null $key, mixed $default = null) 
 * @param \Inilim\Array\Method\dataGet
 * 
 * @method  mixed dataSet(mixed $target, string|string[] $key, mixed $value, bool $overwrite = true) 
 * @method  static  mixed dataSet(mixed $target, string|string[] $key, mixed $value, bool $overwrite = true) 
 * @param \Inilim\Array\Method\dataSet
 * 
 * @method  array divide(array $array) 
 * @method  static  array divide(array $array) 
 * @param \Inilim\Array\Method\divide
 * 
 * @method  array dot(iterable $array, string $prepend = '') 
 * @method  static  array dot(iterable $array, string $prepend = '') 
 * @param \Inilim\Array\Method\dot
 * 
 * @method  array except(array $array, array<string|int>|string|int $keys) 
 * @method  static  array except(array $array, array<string|int>|string|int $keys) 
 * @param \Inilim\Array\Method\except
 * 
 * @method  array exceptNestedArray(array $array, array<string|int>|string|int $keys, int $depth = 1) 
 * @method  static  array exceptNestedArray(array $array, array<string|int>|string|int $keys, int $depth = 1) 
 * @param \Inilim\Array\Method\exceptNestedArray
 * 
 * @method  bool exists(\ArrayAccess|array $array, string|int $key) 
 * @method  static  bool exists(\ArrayAccess|array $array, string|int $key) 
 * @param \Inilim\Array\Method\exists
 * 
 * @method  array fastArrayUnique(array $array) 
 * @method  static  array fastArrayUnique(array $array) 
 * @param \Inilim\Array\Method\fastArrayUnique
 * 
 * @method  array flatten(iterable $array, int $depth) 
 * @method  static  array flatten(iterable $array, int $depth) 
 * @param \Inilim\Array\Method\flatten
 * 
 * @method  void forget(array $array, array<string|int>|string|int $keys) 
 * @method  static  void forget(array $array, array<string|int>|string|int $keys) 
 * @param \Inilim\Array\Method\forget
 * 
 * @method  mixed get(\ArrayAccess|array $array, string|int|null $key, mixed $default = null) 
 * @method  static  mixed get(\ArrayAccess|array $array, string|int|null $key, mixed $default = null) 
 * @param \Inilim\Array\Method\get
 * 
 * @method  null|int getKeyOffset(array $array, string|int $key) 
 * @method  static  null|int getKeyOffset(array $array, string|int $key) 
 * @param \Inilim\Array\Method\getKeyOffset
 * 
 * @method  bool has(\ArrayAccess|array $array, array<string|int>|string|int $keys) 
 * @method  static  bool has(\ArrayAccess|array $array, array<string|int>|string|int $keys) 
 * @param \Inilim\Array\Method\has
 * 
 * @method  bool hasAny(\ArrayAccess|array $array, array<string|int>|int|string|null $keys) 
 * @method  static  bool hasAny(\ArrayAccess|array $array, array<string|int>|int|string|null $keys) 
 * @param \Inilim\Array\Method\hasAny
 * 
 * @method  mixed head(array $array) 
 * @method  static  mixed head(array $array) 
 * @param \Inilim\Array\Method\head
 * 
 * @method  void insertAfter(array $array, string|int|null $key, array $inserted) 
 * @method  static  void insertAfter(array $array, string|int|null $key, array $inserted) 
 * @param \Inilim\Array\Method\insertAfter
 * 
 * @method  void insertBefore(array $array, string|int|null $key, array $inserted) 
 * @method  static  void insertBefore(array $array, string|int|null $key, array $inserted) 
 * @param \Inilim\Array\Method\insertBefore
 * 
 * @method  bool isAssoc(array $array) 
 * @method  static  bool isAssoc(array $array) 
 * @param \Inilim\Array\Method\isAssoc
 * 
 * @method  bool isList(array $array) 
 * @method  static  bool isList(array $array) 
 * @param \Inilim\Array\Method\isList
 * 
 * @method  bool isMultidimensional(array $arr) 
 * @method  static  bool isMultidimensional(array $arr) 
 * @param \Inilim\Array\Method\isMultidimensional
 * 
 * @method  string join(array $array, string $glue, string $final_glue = '') 
 * @method  static  string join(array $array, string $glue, string $final_glue = '') 
 * @param \Inilim\Array\Method\join
 * 
 * @method  array keysLower(array $array) 
 * @method  static  array keysLower(array $array) 
 * @param \Inilim\Array\Method\keysLower
 * 
 * @method  array keysLowerNestedArray(array $array, int $depth = 1) 
 * @method  static  array keysLowerNestedArray(array $array, int $depth = 1) 
 * @param \Inilim\Array\Method\keysLowerNestedArray
 * 
 * @method  array keysUpper(array $array) 
 * @method  static  array keysUpper(array $array) 
 * @param \Inilim\Array\Method\keysUpper
 * 
 * @method  array keysUpperNestedArray(array $array, int $depth = 1) 
 * @method  static  array keysUpperNestedArray(array $array, int $depth = 1) 
 * @param \Inilim\Array\Method\keysUpperNestedArray
 * 
 * @method  mixed last(array $array) 
 * @method  static  mixed last(array $array) 
 * @param \Inilim\Array\Method\last
 * 
 * @method  array<TKey, TValue> map(array<TKey, TValue> $array, callable(TValue, TKey): TValue $callback) 
 * @method  static  array<TKey, TValue> map(array<TKey, TValue> $array, callable(TValue, TKey): TValue $callback) 
 * @param \Inilim\Array\Method\map
 * 
 * @method  array mapWithKeys(array<TKey, TValue> $array, callable(TValue, TKey): array<TMapWithKeysKey, TMapWithKeysValue> $callback) 
 * @method  static  array mapWithKeys(array<TKey, TValue> $array, callable(TValue, TKey): array<TMapWithKeysKey, TMapWithKeysValue> $callback) 
 * @param \Inilim\Array\Method\mapWithKeys
 * 
 * @method  array only(array $array, array<string|int>|string|int $keys) 
 * @method  static  array only(array $array, array<string|int>|string|int $keys) 
 * @param \Inilim\Array\Method\only
 * 
 * @method  array onlyNestedArray(array $array, array<string|int>|string|int $keys, int $depth = 1) 
 * @method  static  array onlyNestedArray(array $array, array<string|int>|string|int $keys, int $depth = 1) 
 * @param \Inilim\Array\Method\onlyNestedArray
 * 
 * @method  array pluck(iterable $array, string|array|int|null $value, string|string[]|null $key = null) 
 * @method  static  array pluck(iterable $array, string|array|int|null $value, string|string[]|null $key = null) 
 * @param \Inilim\Array\Method\pluck
 * 
 * @method  array prepend(array $array, mixed $value, mixed $key = null) 
 * @method  static  array prepend(array $array, mixed $value, mixed $key = null) 
 * @param \Inilim\Array\Method\prepend
 * 
 * @method  array prependKeysWith(array $array, string $prepend_with) 
 * @method  static  array prependKeysWith(array $array, string $prepend_with) 
 * @param \Inilim\Array\Method\prependKeysWith
 * 
 * @method  mixed pull(array $array, string|int $key, mixed $default = null) 
 * @method  static  mixed pull(array $array, string|int $key, mixed $default = null) 
 * @param \Inilim\Array\Method\pull
 * 
 * @method  string query(array $array) 
 * @method  static  string query(array $array) 
 * @param \Inilim\Array\Method\query
 * 
 * @method  mixed random(array $array, int|null $number = null, bool $preserve_keys = false) 
 * @method  static  mixed random(array $array, int|null $number = null, bool $preserve_keys = false) 
 * @param \Inilim\Array\Method\random
 * 
 * @method  bool renameDotKey(array $array, string $old_key, string $new_key) 
 * @method  static  bool renameDotKey(array $array, string $old_key, string $new_key) 
 * @param \Inilim\Array\Method\renameDotKey
 * 
 * @method  bool renameKey(array $array, string|int $old_key, string|int $new_key) 
 * @method  static  bool renameKey(array $array, string|int $old_key, string|int $new_key) 
 * @param \Inilim\Array\Method\renameKey
 * 
 * @method  array set(array $array, null|string $key, mixed $value) 
 * @method  static  array set(array $array, null|string $key, mixed $value) 
 * @param \Inilim\Array\Method\set
 * 
 * @method  bool setValueIfNotExists(array $array, string $key_dot, mixed $value) 
 * @method  static  bool setValueIfNotExists(array $array, string $key_dot, mixed $value) 
 * @param \Inilim\Array\Method\setValueIfNotExists
 * 
 * @method  bool setValueIfNull(array $array, string $key_dot, mixed $value) 
 * @method  static  bool setValueIfNull(array $array, string $key_dot, mixed $value) 
 * @param \Inilim\Array\Method\setValueIfNull
 * 
 * @method  array shuffle(array $array, null|int $seed = null) 
 * @method  static  array shuffle(array $array, null|int $seed = null) 
 * @param \Inilim\Array\Method\shuffle
 * 
 * @method  array sortBy(array $arr, string $by, int $options = sort_regular, bool $descending = false) 
 * @method  static  array sortBy(array $arr, string $by, int $options = sort_regular, bool $descending = false) 
 * @param \Inilim\Array\Method\sortBy
 * 
 * @method  array sortRecursive(array $array, int $options = sort_regular, bool $descending = true) 
 * @method  static  array sortRecursive(array $array, int $options = sort_regular, bool $descending = true) 
 * @param \Inilim\Array\Method\sortRecursive
 * 
 * @method  array sortRecursiveDesc(array $array, int $options = sort_regular) 
 * @method  static  array sortRecursiveDesc(array $array, int $options = sort_regular) 
 * @param \Inilim\Array\Method\sortRecursiveDesc
 * 
 * @method  array take(array $array, int $limit) 
 * @method  static  array take(array $array, int $limit) 
 * @param \Inilim\Array\Method\take
 * 
 * @method  array undot(iterable $array) 
 * @method  static  array undot(iterable $array) 
 * @param \Inilim\Array\Method\undot
 * 
 * @method  mixed value(mixed $value) 
 * @method  static  mixed value(mixed $value) 
 * @param \Inilim\Array\Method\value
 * 
 * @method  array<TKey, TValue>|array{} where(array<TKey,TValue> $array, callable(TValue,TKey): bool $callback) 
 * @method  static  array<TKey, TValue>|array{} where(array<TKey,TValue> $array, callable(TValue,TKey): bool $callback) 
 * @param \Inilim\Array\Method\where
 * 
 * @method  array wrap(mixed $value) 
 * @method  static  array wrap(mixed $value) 
 * @param \Inilim\Array\Method\wrap
 * 
 */
class Array_ extends LazyMethodAbstract
{
   protected const PATH_TO_DIR = __DIR__ . '/Method';
   protected const NAMESPACE   = 'Inilim\Array\Method';
   protected const ALIAS       = [
      // 'before_name' => 'after_name',
   ];
}
