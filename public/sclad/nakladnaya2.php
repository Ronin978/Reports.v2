<style>
    .item-box {
        padding: 10px;
        border-radius: 10px;
        border: 2px solid #000;
    }
    .field-wrapper {   
        border: 1px solid #d5b0b0;
        border-radius: 10px;
        padding: 5px;
    }
    .item-box label {
        display: block;
    }
    .btn-submit-wrapper {
        text-align: center;
        padding: 20px;
    }
    .error-text-block {
        color: red;
        font-weight: 500;
    }
    .red {
        color: red;
    }
</style>
<form action="nakladnaya2.php" method="post">

    <div class="item-box"> <div>Общая информация</div>
        <label> order_numbers (номер накладной)
            <input name="order_numbers" type="text" value="">
        </label>
        <label> order_recipient (получатель)
            <input name="order_recipient" type="text" value="">
        </label>

        <label> order_date (дата)
            <input name="order_date" type="date" value="">
        </label>

    </div>


        <div class="item-box"> <div>Товар 1</div>
            <div class="field-wrapper">
                <label> p1_name (Наименование1)
                    <input name="p1_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p1_code (Код товара 1)
                    <input name="p1_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p1_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p1_units (ед. изм. 1)
                    <select name="p1_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p1_count (кол-во 1)
                    <input name="p1_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p1_count_in_words (кол-во прописью 1)
                    <input name= "p1_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 2</div>
            <div class="field-wrapper">
                <label> p2_name (Наименование2)
                    <input name="p2_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p2_code (Код товара 2)
                    <input name="p2_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p2_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p2_units (ед. изм. 2)
                    <select name="p2_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p2_count (кол-во 2)
                    <input name="p2_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p2_count_in_words (кол-во прописью 2)
                    <input name= "p2_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 3</div>
            <div class="field-wrapper">
                <label> p3_name (Наименование3)
                    <input name="p3_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p3_code (Код товара 3)
                    <input name="p3_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p3_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p3_units (ед. изм. 3)
                    <select name="p3_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p3_count (кол-во 3)
                    <input name="p3_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p3_count_in_words (кол-во прописью 3)
                    <input name= "p3_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 4</div>
            <div class="field-wrapper">
                <label> p4_name (Наименование4)
                    <input name="p4_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p4_code (Код товара 4)
                    <input name="p4_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p4_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p4_units (ед. изм. 4)
                    <select name="p4_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p4_count (кол-во 4)
                    <input name="p4_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p4_count_in_words (кол-во прописью 4)
                    <input name= "p4_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 5</div>
            <div class="field-wrapper">
                <label> p5_name (Наименование5)
                    <input name="p5_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p5_code (Код товара 5)
                    <input name="p5_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p5_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p5_units (ед. изм. 5)
                    <select name="p5_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p5_count (кол-во 5)
                    <input name="p5_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p5_count_in_words (кол-во прописью 5)
                    <input name= "p5_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 6</div>
            <div class="field-wrapper">
                <label> p6_name (Наименование6)
                    <input name="p6_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p6_code (Код товара 6)
                    <input name="p6_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p6_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p6_units (ед. изм. 6)
                    <select name="p6_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p6_count (кол-во 6)
                    <input name="p6_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p6_count_in_words (кол-во прописью 6)
                    <input name= "p6_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 7</div>
            <div class="field-wrapper">
                <label> p7_name (Наименование7)
                    <input name="p7_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p7_code (Код товара 7)
                    <input name="p7_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p7_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p7_units (ед. изм. 7)
                    <select name="p7_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p7_count (кол-во 7)
                    <input name="p7_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p7_count_in_words (кол-во прописью 7)
                    <input name= "p7_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 8</div>
            <div class="field-wrapper">
                <label> p8_name (Наименование8)
                    <input name="p8_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p8_code (Код товара 8)
                    <input name="p8_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p8_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p8_units (ед. изм. 8)
                    <select name="p8_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p8_count (кол-во 8)
                    <input name="p8_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p8_count_in_words (кол-во прописью 8)
                    <input name= "p8_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 9</div>
            <div class="field-wrapper">
                <label> p9_name (Наименование9)
                    <input name="p9_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p9_code (Код товара 9)
                    <input name="p9_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p9_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p9_units (ед. изм. 9)
                    <select name="p9_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p9_count (кол-во 9)
                    <input name="p9_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p9_count_in_words (кол-во прописью 9)
                    <input name= "p9_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 10</div>
            <div class="field-wrapper">
                <label> p10_name (Наименование10)
                    <input name="p10_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p10_code (Код товара 10)
                    <input name="p10_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p10_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p10_units (ед. изм. 10)
                    <select name="p10_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p10_count (кол-во 10)
                    <input name="p10_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p10_count_in_words (кол-во прописью 10)
                    <input name= "p10_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 11</div>
            <div class="field-wrapper">
                <label> p11_name (Наименование11)
                    <input name="p11_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p11_code (Код товара 11)
                    <input name="p11_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p11_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p11_units (ед. изм. 11)
                    <select name="p11_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p11_count (кол-во 11)
                    <input name="p11_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p11_count_in_words (кол-во прописью 11)
                    <input name= "p11_count_in_words" type="text" value="">
                </label>
                                </div>
            
        </div>



        <div class="item-box"> <div>Товар 12</div>
            <div class="field-wrapper">
                <label> p12_name (Наименование12)
                    <input name="p12_name" type="text" size="20" maxlength="20" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p12_code (Код товара 12)
                    <input name="p12_code" type="text" size="12" maxlength="12" value="">
                    <!--
                    <select name="p12_code">
                        <option value=""> </option>
                        <option value="2341585">2341585</option>
                        <option value="2341586">2341586</option>
                        <option value="2341587">1234567</option>
                    </select>
                    -->
                </label>
                                </div>
                <div class="field-wrapper">
                <label> p12_units (ед. изм. 12)
                    <select name="p12_units">
        <option value="шт.">шт.</option><option value="к-кт">к-кт</option><option value="л">л</option><option value="кг">кг</option>                    </select>

                </label>
                                </div>
            <div class="field-wrapper">
                <label> p12_count (кол-во 12)
                    <input name="p12_count" type="text" value="">
                </label>
                                </div>
            <div class="field-wrapper">
                <label> p12_count_in_words (кол-во прописью 12)
                    <input name= "p12_count_in_words" type="text" value="">
                </label>
            </div>
            
        </div>
    <div class="btn-submit-wrapper"><input name="btn_submit" value="Все данные были введены!" type="submit">
    </div>
</form>
