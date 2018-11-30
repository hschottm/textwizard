var TextWizard = {
	textWizard: function(el, command, id) {
    var rows = $(id).getChildren();
    var parentRow = $(el).getParent();
    Backend.getScrollOffset();
    switch (command) {
		case 'new':
			var clone = parentRow.clone(true).inject(parentRow, 'after');
			clone.getFirst().value = "";
			break;
		case 'copy':
			var clone = parentRow.clone(true);
			clone.inject(parentRow, 'after');
			clone.getFirst().value = parentRow.getFirst().value;
			break;
		case 'up':
			if (parentRow.getPrevious()) {
				parentRow.inject(parentRow.getPrevious(),'before')
			}
			break;
		case 'down':
			if (parentRow.getNext()) {
				parentRow.inject(parentRow.getNext(), 'after')
			}
			break;
		case 'delete':
			(rows.length > 1) ? parentRow.dispose() : null;
			break
		}
    rows = $(id).getChildren();
    for (i = 0; i < rows.length; i++)
    {
      row = rows[i];
      items = row.getChildren();
      for (j = 0; j < items.length; j++)
      {
        item = items[j];
        if ($(item).nodeName == 'A')
        {
          item.href = item.href.replace(/cid\=[0-9]+/ig, "cid=" + i);
        }
      }
    }
		if (clone) {
			clone.getFirst().select()
		}
	}
};
