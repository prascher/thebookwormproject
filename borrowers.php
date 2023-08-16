    <header class="squared"><h1>Lending</h1></header>
    <section>
    <div class="wrap">
    <form class="search" action='individualbook.php?id=<?php echo $_GET['id']; ?>' method='POST'>
    <select id='borrower' name='borrower'>
    <option value="">Return</option>
    <!--Add options for people you might lend books to.-->
    </select>
    <button type="submit" class="borrow button" id="lendto" name="lendto" placeholder="Borrow">Borrow</button>
    </form>
    </div>
    </section>
