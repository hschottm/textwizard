var TextWizard = {
	textWizard: function(el, command, id) {
		var table = $(id);
		var rows = table.getChildren().getChildren()[0];
		var parentTd = $(el).getParent();
		var parentTr = parentTd.getParent();
		var cols = parentTr.getChildren();
		Backend.getScrollOffset();
		switch (command) {
		case 'new':
			var clone = parentTr.clone(true).inject(parentTr, 'after');
			clone.getFirst().getFirst().value = "";
			break;
		case 'copy':
			var clone = parentTr.clone(true);
			clone.inject(parentTr, 'after');
			clone.getFirst().getFirst().value = parentTr.getFirst().getFirst().value;
			break;
		case 'up':
			if (parentTr.getPrevious()) {
				parentTr.inject(parentTr.getPrevious(),'before')
			}
			break;
		case 'down':
			if (parentTr.getNext()) {
				parentTr.inject(parentTr.getNext(), 'after')
			}
			break;
		case 'delete':
			(rows.length > 1) ? parentTr.dispose() : null;
			break
		}
		rows = table.getChildren().getChildren();
		for (i = 0; i < rows[0].length; i++) {
			row = rows[0][i];
			a = row.getFirst().getNext().getFirst();
			a.href = a.href.replace(/cid\=[0-9]+/ig, "cid=" + i)
		}
		if (clone) {
			clone.getFirst().getFirst().select()
		}
	}
};
